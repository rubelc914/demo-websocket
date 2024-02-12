<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/message/{id}', function () {


//     for ($i = 0; $i < 3000; $i++) {
//         event( new \App\Events\TradeEvent( $i));
//     }
// });

Route::get('chat-message',[ChatController::class,'chatbox']);

Route::post('send-message',[ChatController::class,'boardcastMsg'])->name('sendMessage');
