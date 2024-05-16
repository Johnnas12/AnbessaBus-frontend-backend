<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Route;
use App\Models\Report;
use App\Models\Tariff;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\toAdminNotification;
use Illuminate\Support\Facades\Notification;

class PassengerSideResponses extends Controller
{
    //
    public function searchResults(Request $request){
        $request->validate([
            'source' => 'required|string',
            'destination' => 'required|string',
        ]);

        $searchResults = Route::where('from', $request->source)
        ->where('to', $request->destination)
        ->get();


        // Return the search results as JSON response
            return response()->json(['data' => $searchResults]);


    }


    public function updateUnreservedSeats(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            //'unreservedSeats' => 'required|array',
            //'unreservedSeats.*' => 'integer', // Ensure each item is an integer
            'unreservedSeats'=>'required',
        ]);

        try {
            // Find the route by ID
            $route = Route::findOrFail($id);

            // Update the unreserved seats for the route
            $route->unreserved = $request->unreservedSeats;
            $route->save();

            // Return a success response
            return response()->json([
                'message' => 'Unreserved seats updated successfully',
                'data' => $request->unreservedSeats,
            ]);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json([
                'message' => 'Failed to update unreserved seats',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function ticket(Request $request){
        $request->validate([
            'routeID'=> 'required', 
            'starttime' => 'required', 
            'departuretime'=> 'required', 
            'starttime' => 'required',
            'departuretime' => 'required',
            'price' => 'required'
        ]);

        $ticketId =  Str::random(15); 

        if (!ctype_alpha($ticketId[0])) {
            $ticketId = chr(rand(65, 90)) . substr($ticketId, 1);
        }
        $ticketId .= rand(100, 999);

        $user = Ticket::create([
            'routeID' => $request->routeID,
            'ticketID' => $ticketId,
            'passengerID'=>$request->passengerID,
            'from' => $request->from, 
            'to' => $request->to,
            'status' => 'Valid',
            'starttime' => $request->starttime,
            'departuretime' => $request->departuretime,
            'price' => $request->price,
            
        ]);
        $item = Route::find($request->routeID); // Assuming you're looking for the item by its ID
        if ($item) {
            $item->availableseats = $item->availableseats - 1; // Decrease the value by 1
            $item->save(); // Save the updated value back to the database
        }
        return response()->json([
            'message' => 'Ticket Created Successfully',
        ]);
    }


    public function lostItem(Request $request){
        $request->validate([
            'passenger'=> 'required', 
            'category' => 'required', 
            'decsription'=> 'required', 
        ]);


        $user = Report::create([

            'passenger' => $request->passenger,
            'category' => $request->category,
            'decsription'=>$request->decsription,
            'contactInfo' =>$request->contactInfo,
            'status' => 'Pending'
            
        ]);

        $dataforNotification = [ 'fname' => $request->passenger, 'lname' => "", 'description' =>"Lost Item Request! ". $request->catergory. ", ". $request->decsription   , 'profile' => "avatar.png"];

        $admin = User::where('type', '=', '1')->get();

        Notification::sendNow($admin, new toAdminNotification($dataforNotification));
        return response()->json([
            'message' => 'Reported successfully',

        ]);

    }

    public function ticketRefresh($id){  
        $tickets = Ticket::where('id', $id)->latest()->get();

        //$ticketsnumber = count($tickets);
        foreach ($tickets as $ticket) {
            $now =  Carbon::now();
            $starttime = Carbon::createFromFormat('H:i', $ticket->starttime);
            $departuretime = Carbon::createFromFormat('H:i', $ticket->departuretime);

            if ($now->between($starttime, $departuretime)) {
                $ticket->status = 'Valid';
            } else {
                $ticket->status = 'Invalid';
            }

            $ticket->save(); 
        }


        $data = Ticket::where('passengerID',  $id)->get();
        return response()->json(([
            'message' => 'Refresh Successfully', 
            'data' => $data,
            
        ]));

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }


    
}
