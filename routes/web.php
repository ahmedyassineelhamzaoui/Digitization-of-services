<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PaymentController;


// use App\Http\Livewire\SearchApplications;

// use App\Http\Livewire\UserSearch;


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
    Route::post('logout', 'logout')->name('user.logout');
    Route::get('login', 'index')->name('login');
    Route::get('home', 'home')->name('home');
    Route::get('/profile', 'editProfile')->name('profile.edit');
    Route::post('/profile/update', 'updateProfile')->name('profile.update');
    Route::post('/profile/update-image',  'updateImage')->name('profile.updateImage');
    Route::get('Réinitialiser-mot-de-pass','forgetPassword')->name('forget.passwordpage');
    Route::post('Réinitialiser-mot-de-pass','sendEmail')->name('forget.password');
    Route::get('changer-mot-de-pass/{token}','showChangePassword')->name('change.passwordpage');
    Route::post('changer-mot-de-pass/{token}','changePassword')->name('change.password');

});
Route::controller(UserController::class)->group(function(){
    Route::get('utilisateurs','index');
    Route::get('modifier-utilisateur/{id}','editUser');
    Route::put('updateProfile','updateProfile');
    Route::delete('deleteProfile','deleteProfile');
    Route::delete('utilisateurs','deleteUser')->name('delete.user');
    Route::put('utilisateurs','updateUser')->name('update.user');
    Route::post('utilisateurs','createUser')->name('create.user');
});
Route::controller(FormController::class)->group(function(){
   Route::post('/formulaire/{personel_id}','storeInformation')->name('send.Information');
   Route::get('/formulaire','index');
});

Route::controller(RoleController::class)->group(function(){
   Route::get('roles','getRoles');
   Route::post('roles','createRole')->name('create.role');
   Route::put('roles','updateRole')->name('update.role');
   Route::get('modifier-role/{id}','showRole');
   Route::delete('roles','deleteRole')->name('delete.role');
});

Route::controller(ApplicationController::class)->group(function(){
   Route::get('demandes','index')->name('demande');
   Route::get('show-files/{id}','showFiles');
   Route::put('demandes','updateStatus')->name('update.status');
   Route::get('edit-application/{id}','showEditform');
   Route::delete('demandes','deleteApplication')->name('delete.application');
   Route::get('search-application','searchApplication')->name('application.search');
});
Route::controller(NotificationController::class)->group(function(){
    Route::get('notifications','index')->name('Notification');
    Route::get('MarqueAsread','marqueAllasread');
    Route::delete('deleteNotification','deleteNotification')->name('delete.notification');
});
Route::controller(AnalyticController::class)->group(function(){
    Route::get('statistiques','index');
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



Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

// Route::get('auth/facebook', [SocialiteController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [SocialiteController::class, 'handleFacebookCallback']);




// Route::get('/search-applications', SearchApplications::class);


// Route::get('/users', UserSearch::class);
// Route::post('/generer-avis-recette', [ApiController::class, 'genererAvisRecette'])->name('payment.verifiy');
// Route::get('/api/data', [ApiController::class, 'getApiData']);
