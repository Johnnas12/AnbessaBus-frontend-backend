<?php

use App\Http\Controllers\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChapaController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\StroreKeeper\StoreController;
use App\Http\Controllers\SystemAdmin\SystemAdminController;
use App\Http\Controllers\Maintainance\MaintainanceController;
use App\Http\Middleware\CheckUserStatus;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data = Blog::get();
    return view('index', ['data' => $data]);
})->name('landingPage');
Route::post('contact', [AdminController::class, 'storeContacts'])->name('storeContacts');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/storeusers', [UserController::class, 'store'])->name('store');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/busesdata', [StoreController::class, 'busesDataFlotChart']);
Route::get('/sparedata', [StoreController::class, 'spareDataFlotChart']);
Route::get('/linechart', [AdminController::class, 'lineChartData']);
Route::get('/barchart', [AdminController::class, 'barChartData']);
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/editprofile', [UserController::class, 'editProfile'])->name('editProfile');
Route::put('/updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::get('/changepw', [UserController::class, 'changepw'])->name('changepw');
Route::put('/updatepw', [UserController::class, 'updatepw'])->name('updatepw');








// Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');



Route::middleware(['auth', 'checkUserStatus'])->group(function () {
Route::group(['middleware'=>'preventback'], function(){

Route::middleware(['auth', 'user-access:SystemAdmin'])->group(function () {


    Route::get('systemadmin/index', [SystemAdminController::class, 'index'])->name('sysadminDashboard');
    
});

Route::middleware(['auth', 'user-access:Admin'])->group(function () {

    Route::get('markAllasRead', [AdminController::class, 'markAllAsRead'])->name('markAllAsRead');

    // ============================Charts Data========================//

    // ============================End of chart Data =================//

    Route::get('admin/lostItems', [AdminController::class, 'manageLostItems'])->name('lostItems');
    Route::get('admin/contacts', [AdminController::class, 'contacts'])->name('contacts');


    Route::get('admin/assets', [AdminController::class, 'assets'])->name('assets');
    Route::get('admin/blogpost', [AdminController::class, 'blogpost'])->name('blogpost');
    Route::post('admin/storePost', [AdminController::class, 'storePost'])->name('storePost');
    Route::get('admin/manageBlog', [AdminController::class, 'manageBlog'])->name('manageBlog');
    Route::delete('/blog-posts/{id}', [AdminController::class, 'deleteBlog'])->name('deleteBlog');
    Route::get('/blog-posts/{id}/edit', [AdminController::class, 'editblog'])->name('editblog');
    Route::put('/blog-posts/{id}', [AdminController::class, 'updateblog'])->name('updateblog');
    
    
    Route::get('admin/index', [AdminController::class, 'index'])->name('admin.index');
    Route::get('registrationForm', [UserController::class, 'registrationForm'])->name('registrationForm');
    Route::get('manageEmployee', [AdminController::class, 'manageEmployee'])->name('manageEmployee');
    Route::get('admin/route', [AdminController::class, 'routePage'])->name('routeview');
    Route::post('admin/route/store', [AdminController::class, 'storeRoute'])->name('storeRoute');
    Route::get('admin/createTarrif', [AdminController::class, 'tarrifView'])->name('tarrifView');
    Route::post('admin/storeTarrif', [AdminController::class, 'storeTarrif'])->name('storeTarrif');
    Route::get('admin/manageTarrif', [AdminController::class, 'manageTarrif'])->name('manageTarrif');
    Route::get('admin/manageRoute', [AdminController::class, 'manageRoute'])->name('manageRoute');
    Route::get('admin/tarrifshow/{id}', [AdminController::class, 'TarrifshowMore'])->name('TarrifshowMore');
    Route::get('admin/editTarrif/{id}', [AdminController::class, 'routeEdit'])->name('routeEdit');
    
    Route::patch('admin/updateRoute/{id}', [AdminController::class, 'updateRoute'])->name('updateRoute');
    Route::delete('/routedelete/{id}', [AdminController::class, 'routeDelete'])->name('routeDelete');
    Route::delete('/tarrifdelete/{id}', [AdminController::class, 'tarrifDelete'])->name('tarrifDelete');

    
    
    Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
    Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
    Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
    Route::post('/attendances/{attendance}/toggle-presence', [AttendanceController::class, 'togglePresence'])->name('attendances.toggle-presence');


    
    
    Route::get('admin/showlLostItems/{id}', [AdminController::class, 'showlLostItems'])->name('showlLostItems');

    Route::get('admin/tarrifedit/{id}', [AdminController::class, 'tarrifEdit'])->name('tarrifEdit');
    Route::patch('admin/updateTarrif/{id}', [AdminController::class, 'updateTarrif'])->name('updateTarrif');

    // routes/web.php
    Route::put('/update-status/{id}', [AdminController::class, 'updateStatus'] )->name('update.status');


    Route::get('admin/employeeId/{id}', [AdminController::class, 'employeeId'])->name('employeeId');

    Route::get('admin/payment', [AdminController::class, 'payment'])->name('payment');
    Route::post('pay', 'App\Http\Controllers\ChapaController@initialize')->name('pay');

    // The callback url after a payment
    Route::get('callback/{reference}', 'App\Http\Controllers\ChapaController@callback')->name('callback');

    Route::get('payshow', [Payment::class, 'payshow'])->name('payyy');
    Route::post('payment', [Payment::class, 'makePayment'])->name('makePayment');


    Route::patch('/users/{user}/toggle-status', [AdminController::class, 'toggleStatus'])->name('users.toggle-status');


    



    });

    Route::middleware(['auth', 'user-access:Driver'])->group(function () {

    Route::get('driver/index', [DriverController::class, 'index'])->name('driver.index');
    Route::get('driver/assigned', [DriverController::class, 'assigned'])->name('driver.assigned');
    });


Route::middleware(['auth', 'user-access:'])->group(function () {
    
    Route::get('maintainance/index', [MaintainanceController::class, 'index'])->name('maintainance.index');

});
Route::middleware(['auth', 'user-access:StoreKeeper'])->group(function () {
    
    Route::get('storeKeeper/index', [StoreController::class, 'index'])->name('storekeeper.index');
    Route::get('storeKeeper/registerAssets', [StoreController::class, 'registerAssets'])->name('storekeeper.register');
    Route::get('storeKeeper/registerSpares', [StoreController::class, 'registerSpares'])->name('storekeeper.registerSpares');
    Route::post('storeKeeper/storeSpares', [StoreController::class, 'storeOrUpdate'])->name('storekeeper.storespares');
    Route::post('storeKeeper/storeBuses', [StoreController::class, 'storeBuses'])->name('storekeeper.storeBuses');
    Route::get('storeKeeper/storeSpares', [StoreController::class, 'useSpare'])->name('storekeeper.useSpare');
    Route::post('storeKeeper/quantityDecrease', [StoreController::class, 'quantityDecrease'])->name('storekeeper.decrease');
    Route::get('storeKeeper/managebus', [StoreController::class, 'busManage'])->name('storekeeper.busManage');
    Route::get('storeKeeper/spareManage', [StoreController::class, 'spareManage'])->name('storekeeper.spareManage');

    //=========================charts Route =========================//
    
    //Route::get('/busesdata', [StoreController::class, 'busesDataFlotChart']);
    //Route::get('/sparedata', [StoreController::class, 'spareDataFlotChart']); 

});
});
});

