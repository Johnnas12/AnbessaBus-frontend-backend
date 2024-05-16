<?php

namespace App\Http\Controllers\Driver;

use App\Models\User;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    //
    public function index(){
        return view('Driver.index');
    }

    public function assigned(){
        $datas = Route::where('driver', Auth::user()->name . " " .  Auth::user()->mname)->get();
        return view('driver.assigned', ['datas' => $datas]);
    }
}
