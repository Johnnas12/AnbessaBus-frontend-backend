<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function registrationForm(){

        return view('registerusers');
        
    }


    
    public function store(Request $request){

        $data=$request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'mname' =>['required'],
            'lname' =>['required'],
            'username' =>['required'],
            'phone' =>['required'],
            'position' =>['required'],
            'age' =>['required'],
            'expriance' =>['required'],
            'gender' =>['required'],
            'profile'=>'image|mimes:png,jpg,jpeg',

        ]);


        if ($request->hasFile('profile')) {
            $size=$request->file('profile')->getSize();
            $name=$request->file('profile')->getClientOriginalName();
            $data['profile'] = $request->file('profile')->storeAs('images/profiles',$name);
          }

          $user = User::create($data);

    //    $user =  User::create([

    //         'name' => $request->name,
    //         'mname' => $request->mname,
    //         'lname' =>$request->lname, 
    //         'username' => $request->username,
    //         'phone' => $request->phone,
    //         'position' => $request->position,
    //         'age' => $request->age,
    //         'expriance' => $request->expriance,
    //         'gender' => $request->gender,
    //         'profile' => $request->profile,
    //         'email' => $request->email,  
    //         'password' => Hash::make($request->password),
    //         'type' => $request->role,

    //     ]);


        //defining roles

        //   Role::create(['name' => 'Admin']);
        //   Role::create(['name' => 'SystemAdmin']);
        //   Role::create(['name' => 'Driver']);
        //   Role::create(['name' => 'Maintainance']);


        $customeRoleName = '';
        if ($request->role == "1") {
            $customeRoleName = 'SystemAdmin';
        }else if($request->role == "2"){
            $customeRoleName = 'Admin';
        }else if($request->role == "3"){
            $customeRoleName = 'Driver';
        }else if($request->role == "4"){
            $customeRoleName = 'Maintainance';
        }
    
        //$role = $request->input('role');
        $user->assignRole($customeRoleName);


    
    
        return redirect()->route('admin.index')->with('message', 'Employee Registered successfully!');
    }


    public function profile(){
        return view('profile', [
            'user' => User::find(1),
        ]);
    }

    public function editProfile(){

        return view('editProfile', [
            'user' => User::find(1),
            
        ]);

    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required',
            'age' => 'required',
            //'password' => 'nullable|string|min:8|confirmed',
            Rule::unique('users')->ignore($user->id),
        ]);
    
        $userData = [
            'name' => $request->name,
            //'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
        ];
    
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }
    
       $user->update($userData);
    
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }


    public function changepw(){

        return view('changepw');

    }

    public function updatepw(Request $request, User $user){
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|confirmed',
            ]);
            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'The current password is incorrect.');
            }
    
            $user->password = Hash::make($request->password);

            //dd($user);
           $user->save();
          
    
            return redirect()->route('profile')->with('success', 'Password changed successfully!');
        }

        // public function updatepw(Request $request, User $user)
        // {
        //     $request->validate([
        //         'current_password' => 'required',
        //         'password' => 'required|confirmed',
        //     ]);
        
        //     if (!Hash::check($request->current_password, $user->password)) {
        //         return back()->with('error', 'The current password is incorrect.');
        //     }
        
        //     $user->password = bcrypt($request->password);
        //     $user->save();
        
        //     return redirect()->route('profile')->with('success', 'Password changed successfully!');
        // }

    

}
