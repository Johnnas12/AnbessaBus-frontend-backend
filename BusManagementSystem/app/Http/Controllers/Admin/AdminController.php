<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Blog;
use App\Models\User;
use App\Models\Route;
use App\Models\Spare;
use App\Models\Report;
use App\Models\Tarrif;
use App\Models\Ticket;
use App\Models\Contact;
use BaconQrCode\Writer;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\BarcodeGenerator;
use App\Http\Controllers\Controller;
use Milon\Barcode\BarcodeGeneratorPNG;
use BaconQrCode\Renderer\ImageRenderer;
use Illuminate\Database\Eloquent\Casts\Json;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class AdminController extends Controller
{
    //
    public function index(){

    $today = Carbon::today();
    $yesterday = Carbon::yesterday();
    $lastWeek = Carbon::today()->subDays(7);

    $countToday = Ticket::whereDate('created_at', $today)->count();
    $countYesterday = Ticket::whereDate('created_at', $yesterday)->count();
    $countLastWeek = Ticket::whereDate('created_at', '>=', $lastWeek)->whereDate('created_at', '<=', $today)->count();

    $sumToday = Ticket::whereDate('created_at', $today)->sum('price');
    $sumYesterday = Ticket::whereDate('created_at', $yesterday)->sum('price');
    $sumLastWeek = Ticket::whereDate('created_at', '>=', $lastWeek)->whereDate('created_at', '<=', $today)->sum('price');

        $user = User::find(1);
        //var_dump($number);
        $tickets = Ticket::Count();
        return view('Admin.index', compact('user', 'countToday', 'countYesterday', 'countLastWeek', 'sumToday', 'sumYesterday', 'sumLastWeek'));
       

    }

    public function routePage(){
        $user = User::find(1);

        return view('Admin.routePage', ['datas' => Tarrif::get(), 
                                        'drivers' => User::where('type', 2)->get(), 
                                        'user' => $user
    ]);
    }

    public function storeRoute(Request $request){
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'driver' => 'required',
            'starttime' => 'required',
            'departuretime' => 'required',
        ]);

        $startCity = $request->input('from');
        $destinationCity = $request->input('to');

        $trip = Tarrif::where('from', $startCity)
                    ->where('to', $destinationCity)
                    ->first();
        

        if ($trip) {
            $price = $trip->price;
            $busnum = $trip->busnum;
            $distance = $trip->distance;
        }
        

        $initial_seats = '[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38]';
        $initial_reserved = '[]';

        try {
            $route = new Route([
                'busnum' => $busnum,
                'from' => $request->from,
                'to' => $request->to,
                'via' => $request->via,
                'driver' => $request->driver,
                'starttime' => $request->starttime,
                'departuretime' => $request->departuretime,
                'price' => $price,
                'distance' => $distance,
                'availableseats' => 37,
                'reserved' => $initial_reserved,
                'unreserved' => $initial_seats,
            ]);
            $route->save();
    
            return redirect()->back()->with('message', "Route Created Successfully");
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('fail', "Tarrif not found for this route, Make sure you created tarrif");
        }
    }

    public function tarrifView(){
        $user = User::find(1);

        return view('Admin.tarrifctrl', [
            'user' => $user
        ]);
    }

    public function storeTarrif(Request $request){
        $request->validate([
            'busnum' => 'required', 
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'price' => 'required', 
        ]);

        Tarrif::create([
            'busnum' => $request->busnum,
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'distance' => $request->distance, 
            'price' => $request->price,
        ]);

        return redirect()->back()->with('message', "Tarrif Created Successfully");
    }

    public function updateTarrif(Request $request,  $id){
        $request->validate([
            'busnum' => 'required', 
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'distance' => 'required',
            'price' => 'required', 
        ]);

        Tarrif::where('id', $id)->update([
            'busnum' => $request->busnum,
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'distance' => $request->distance, 
            'price' => $request->price,
        ]);

        return redirect()->route('manageTarrif')->with('message', "Tarrif Updated Successfully!");
    }

    public function updateStatus($id) {
        $record = Report::findOrFail($id);
        if($record->status == 'Closed'){
            $record->status = 'Pending'; // Update the status to 'Closed'

        }else{
            $record->status = 'Closed'; // Update the status to 'Closed'

        }
        $record->save();
    
        return redirect()->back();
    }


    public function manageTarrif(){
        $user = User::find(1);
        return view('Admin.tarrifManage', ['datas' => Tarrif::get(), 
                    'user' => $user
    ]);
    }

    public function manageRoute(){
        $user = User::find(1);
        return view('Admin.routemanage', ['datas' => Route::get(), 
                    'user' => $user
    ]);
    }

    public function routeEdit(string $id){

        $user = User::find(1);

        return view('Admin.edit.routeedit',
        ['data' => Route::where('id', '=',  $id)->first(),
         'datas' => Tarrif::get(), 
         'drivers' => User::where('type', 2)->get(), 
         'user' => $user
        ]);
    }

    public function updateRoute(Request $request,  $id){
        $request->validate([
            'from' => 'required',
            'to' => 'required',
            'via' => 'required',
            'driver' => 'required'
            
           
        ]);

        Route::where('id', $id)->update([
            'from' => $request->from, 
            'to' => $request->to, 
            'via' => $request->via, 
            'driver' => $request->driver,
            'starttime' => $request->starttime,
            'departuretime' => $request->departuretime,
           
        ]);

        return redirect()->route('manageRoute')->with('message', "Route Updated Successfully!");
    }

    public function payment(){
        return view("Admin.pay");
    }

    public function TarrifshowMore(string $id){

        $user = User::find(1);
        return view('Admin.tarrifshow',
        ['data' => Tarrif::where('id', '=',  $id)->first(),
         'user' => $user
        ]);

    }

    public function tarrifDelete($id)
        {
            $item = Tarrif::find($id);

            if ($item) {
                $item->delete();
                // Optionally, you can perform additional actions after deletion
            }

            return redirect()->route('manageTarrif')->with(['fail', "Tarrif Deleted Successfully Successfully!"]); // Redirect to the index page or any other appropriate route
        }

        public function routeDelete($id)
        {
            $item = Route::find($id);

            if ($item) {
                $item->delete();
                // Optionally, you can perform additional actions after deletion
            }

            return redirect()->route('manageRoute')->with(['fail', "Route Deleted Successfully Successfully!"]); // Redirect to the index page or any other appropriate route
        }


    
    public function tarrifEdit(string $id){

        $user = User::find(1);

        return view('Admin.edit.tarrifedit',
        ['data' => Tarrif::where('id', '=',  $id)->first(),
         'datas' => Tarrif::get(), 
         'drivers' => User::where('type', 2)->get(), 
         'user' => $user
        ]);
    }

    public function manageEmployee(){

        $user = User::find(1);

        return view('Admin.manageemployee', [
            'datas' => User::whereNotIn('type', [5])->get(), 
            'user' => $user
        ]);
    }

    public function employeeId(string $id){

        $user = User::find(1);

   
        $barcode = DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T',3,33);
        

        return view('Admin.employeeID',
        ['data' => User::where('id', '=',  $id)->first(),
          'barcode' => $barcode, 
          'user' => $user  
        ]);

    }


    public function markAllAsRead(){
        $user = User::find(1);
        $user->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function manageLostItems(){
        return view('Admin.lostItem', ['datas' => Report::get(), 'user' => User::find(1)]);
    }

    public function showlLostItems($id){


        return view('Admin.lostshow', ['data' => Report::where('id', $id)->first(), 'user' => User::find(1)]);
    }

    public function lineChartData()
    {
        $months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
        ];

        $number = [];

        foreach ($months as $month) {
            $count = DB::table('users')->whereMonth('created_at', '=', date('m', strtotime($month)))->count();
            $number[] = $count;
        }

        $data = [
            'labels' => $months,
            'datasets' => [
                [
                    'label' => "number of users",
                    'fill' => true,
                    'lineTension' => 0.5,
                    'backgroundColor' => "rgba(85, 110, 230, 0.2)",
                    'borderColor' => "#556ee6",
                    'borderCapStyle' => "butt",
                    'borderDash' => [],
                    'borderDashOffset' => 0,
                    'borderJoinStyle' => "miter",
                    'pointBorderColor' => "#556ee6",
                    'pointBackgroundColor' => "#fff",
                    'pointBorderWidth' => 1,
                    'pointHoverRadius' => 5,
                    'pointHoverBackgroundColor' => "#556ee6",
                    'pointHoverBorderColor' => "#fff",
                    'pointHoverBorderWidth' => 2,
                    'pointRadius' => 1,
                    'pointHitRadius' => 10,
                    'data' => $number,
                ],
            ],
        ];

        return response()->json($data);
    }

    public function barChartData()
    {
        $months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
        ];

        $number = [];


        foreach ($months as $month) {
        $count = Ticket::whereMonth('created_at','=', date('m', strtotime($month)))->sum('price');
    // $count = DB::table('users')->whereMonth('created_at', '=', date('m', strtotime($month)))->count();
            $number[] = $count;
        }

        $data = [
            'labels' => $months,
            'datasets' => [
                [

                    'label'=> "Ticket Sales Analytics",
                    'backgroundColor'=> "#F4B678",
                    'borderColor'=> "#EF9234",
                    'borderWidth'=> 1,
                    'hoverBackgroundColor'=> "#EC7A08",
                    'hoverBorderColor'=> "#EC7A08",
                    'data'=> $number,
                ],
            ],
        ];

        return response()->json($data);
    }


    public function assets(){

        $user = User::find(1);
        $regular = Bus::where('type', 'regular')->count();
        $doubleDeck = Bus::where('type', '=',  'Double Decker')->count();
        $school = Bus::where('type', 'school')->count();

        $elec = Spare::where('category', 'Electrical Components' )->sum('quantity');
        $engine = Spare::where('category', 'Engine Components' )->sum('quantity');
        $suspension = Spare::where('category', 'Suspension and Steering Components' )->sum('quantity');
        $brake = Spare::where('category', 'Brake System' )->sum('quantity');
        $trans = Spare::where('category', 'Transmission and Drivetrain' )->sum('quantity');
        $cooling = Spare::where('category', 'Cooling System' )->sum('quantity');
        $air = Spare::where('category', 'Air Conditioning' )->sum('quantity');
        $body = Spare::where('category', 'Body and Interior' )->sum('quantity');


        return view('Admin.assets', compact('user', 'regular', 'doubleDeck', 'school', 'elec' , 'engine', 'suspension', 'brake', 'trans', 'cooling', 'air', 'body'));

    }

    public function blogpost(){
        $user = User::find(1);
        return view('Admin.blogpost', ['user' => $user]);
    }

    public function storePost(Request $request){
        $data=$request->all();

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'profile'=>'image|mimes:png,jpg,jpeg',

        ]);


        if ($request->hasFile('profile')) {
            $size=$request->file('profile')->getSize();
            $name=$request->file('profile')->getClientOriginalName();
            $data['profile'] = $request->file('profile')->storeAs('images/profiles',$name);
          }

          $user = Blog::create($data);

          return redirect()->route('manageBlog')->with('message', 'Successfully created');

    }


    
    public function storeContacts(Request $request){
        $data=$request->all();

        $request->validate([
            'sender_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($data);

        return redirect()->back();
    }

    public function manageBlog(){
        Blog::get();
        
        return view('Admin.manageblog', 
        [
            'blog' => Blog::get(),
            'user' => User::find(1), 
        ]
        );
    }

    public function deleteBlog($id){
             $blogPost = Blog::find($id);

             if (!$blogPost) {
                 return response()->json(['message' => 'Blog post not found'], 404);
             }
             $blogPost->delete();
             return redirect()->back()->with('message', 'Blog post deleted successfully');

    }

    public function editblog($id)
    {
        
        $blogPost = Blog::find($id);

       
        if (!$blogPost) {
            return response()->json(['message' => 'Blog post not found'], 404);
        }

        return view('Admin.edit.editblog', ['blog' => $blogPost, 
                                            'user' => User::find(1), 
                                            ]);
    }

    public function updateblog(Request $request, $id)
    {
        $blogPost = Blog::find($id);


        if (!$blogPost) {
            return response()->json(['message' => 'Blog post not found'], 404);
        }

        $blogPost->title = $request->input('title');
        $blogPost->description = $request->input('description');
        $blogPost->save();
        return redirect()->route('manageBlog')->with('success', 'Blog post updated successfully');
    }
// $user->update(['status' => !$user->status]);
    // public function toggleStatus(User $user)
    // {
        
    //    DB::table('users')->update(['status' => !$user->status]);
       

    //     return redirect()->back()->with('success', 'User status updated successfully.');
    // }


    public function toggleStatus(User $user)
    {
        $user->status = !$user->status;
        $user->save();

        return redirect()->back()->with('success', 'User status updated successfully.');
    }

    public function contacts(){
    
        return view('Admin.contacts', ['contacts' => Contact::get(),
        'user' => User::find(1), 
    ]);
    }


}
