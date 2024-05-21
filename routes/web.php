<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

use App\Models\Patient;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/about', [HomeController::class,'about']);

Route::get('/contact_us', [HomeController::class,'contact']);

Route::post('/post_message', [HomeController::class,'post_message']);

Route::get('/services', [HomeController::class,'services']);

Route::get('/service/1', [HomeController::class,'service']);

Route::get('/services', [HomeController::class,'services']);

Route::get('/search', [AdminController::class,'search']);

Route::get('/shop', [HomeController::class,'shop']);

Route::get('/subscribe', [HomeController::class,'newsletter']);

Route::get('/coming_soon', [HomeController::class,'coming_soon']);

Route::get('order_drug/{id}', [PatientController::class,'order_drug']);

//Admin Functions
Route::prefix('admin')->middleware('auth','isAdmin')->group(function() {
    Route::get('dashboard', [AdminController::class,'index']);
    Route::get('/patients', [AdminController::class,'patients']);
    Route::get('/patient/{id}', [AdminController::class,'patient']);

    Route::get('/doctors', [AdminController::class,'doctors']);
    Route::get('/doctor/{id}', [AdminController::class,'doctor']);
    Route::get('/new_doctor', [AdminController::class,'new_doctor']);
    Route::post('/post_doctor', [AdminController::class,'post_doctor']);

    Route::get('/messages', [AdminController::class,'messages']);
    Route::get('/message/{id}', [AdminController::class,'message']);

    Route::get('/products', [AdminController::class,'products']);
    Route::get('/product/{id}', [AdminController::class,'product']);
    Route::get('/new_product', [AdminController::class,'new_product']);
    Route::post('/post_product', [AdminController::class,'post_product']);

    Route::get('/orders', [AdminController::class,'orders']);
    Route::get('/order/{id}', [AdminController::class,'order']);
});

//Doctor Functions
Route::prefix('doctor')->middleware('auth','isDoctor')->group(function() {
	Route::get('dashboard', [DoctorController::class,'index']);
    Route::get('/appointments', [DoctorController::class,'appointments']);
    Route::get('/chats', [DoctorController::class,'chats']);
    Route::get('/chat/{id}', [DoctorController::class,'chat']);
    Route::post('/new_message', [DoctorController::class,'new_message']);
});

//Patient Functions
Route::prefix('patient')->middleware('auth','isPatient')->group(function() {
	Route::get('/home', [PatientController::class,'index']);
    Route::get('/about', [PatientController::class,'about']);
    Route::get('/contact_us', [PatientController::class,'contact']);
    Route::get('/services', [PatientController::class,'services']);
    Route::get('/services/1', [PatientController::class,'services']);
    Route::get('/shop', [PatientController::class,'shop']);
    Route::get('/shop/drug/{id}/{name}', [PatientController::class,'Drug']);

    Route::get('/appointments', [PatientController::class,'appointments']);
    Route::get('/new_appointment', [PatientController::class,'new_appointment']);
    Route::post('/set_appointment', [PatientController::class,'set_appointment']);
    Route::get('/cancel_appointment', [PatientController::class,'cancel_appointment']);

    //Route::get('/chats', [PatientController::class,'chats']);
    Route::get('start_chat', [PatientController::class,'start_chat']);
    Route::get('/new_chat/{id}', [PatientController::class,'new_chat']);
    Route::get('/chats', [PatientController::class,'chats']);
    Route::get('/chat/{id}', [PatientController::class,'chat']);
    Route::post('/new_message', [PatientController::class,'new_message']);
    Route::get('/video_chat/{id}', [PatientController::class,'video_chat']);


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/dashboard', [HomeController::class,'auth']);
