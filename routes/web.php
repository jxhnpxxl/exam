<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{player_id}/contacts', [HomeController::class, 'detail'])->name('home.contacts');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('contacts.index');
    })->name('dashboard');
    
    Route::resource('/contacts', ContactController::class);
    // Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    // Route::get('/contacts/{userId}/create', [ContactController::class, 'create'])->name('contacts.create');
    // Route::get('/contacts/{userId}/store', [ContactController::class, 'store'])->name('contacts.store');
});

