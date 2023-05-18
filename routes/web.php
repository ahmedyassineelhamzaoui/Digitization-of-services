<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::controller(AuthController::class)->group(function(){
    Route::post('register','register');
    Route::post('login','login')->name('connection');
    Route::post('logout', 'logout');
    Route::get('login', 'index')->name('login');
    Route::get('home', 'home')->name('home');

});
Route::controller(UserController::class)->group(function(){
    Route::get('utilisateurs','index');
    Route::put('updateProfile','updateProfile');
    Route::delete('deleteProfile','deleteProfile');
    Route::delete('deleteUser','deleteUser');
    Route::put('updateUser','updateUser');
    Route::post('utilisateurs','createUser')->name('create.user');
});
Route::controller(FormController::class)->group(function(){
   Route::post('/formulaire','storeInformation')->name('send.Information');
   Route::get('/formulaire','index');
});

Route::controller(RoleController::class)->group(function(){
   Route::get('roles','getRoles');
});
Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('home');
});

/* anl detail route */
Route::get('anl-detail',function () {
    return view('anl-detail');
});


Route::get('dashboard',function(){
   return view('layouts.dashboard.common-dash');
});

