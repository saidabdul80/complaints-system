<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EmailMessageController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Mail\MailtrapMailler;
use Illuminate\Support\Facades\Mail;

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


//Auth::routes();

Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/submitForm', [HomeController::class,'submitForm'])->name('form');
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/get_messages', [MessageController::class, 'getAllMessage']);
Route::post('/read_message', [MessageController::class, 'readMessage']);

/*
	Route::post('/get_aspirants', [PostController::class, 'getAspirants']);
*/




Route::post('/register', [RegisterController::class, 'create'])->name('register');
Route::get('/register', [RegisterController::class,'index']);
Route::get('/inbox', [InboxController::class,'inbox']);
Route::post('/send_resolve_message', [EmailMessageController::class, 'default']);
Route::middleware(['authlogin'])->group(function(){
        	
	Route::get('/send-mail', function () {
	    Mail::to('newuser@example.com')->send(new MailtrapMailler());
	    return 'A message has been sent to Mailtrap!';
	});
});
