<?php

use Illuminate\Support\Facades\Route;
use App\Events\first_event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PrivateChannelController;
use App\Http\Controllers\PresenceChannelController;
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



// *****************multiuser live tracking project *******************
Route::post('/test', [Controller::class, 'abc'] );
Route::get('/test1', [Controller::class, 'abc1'] );
 Route::post('/test1',  [Controller::class, 'abc1'] );
 Route::get('/map_dropdown',  [Controller::class, 'dropdown'] );
 Route::post('/map_dropdowns',  [Controller::class, 'dropdowns'] );
 Route::get('/multiple', function () {
    return view('multipleuser');
});
 // *****************multiuser live tracking project *******************

 Route::get('/login',  [PrivateChannelController::class, 'channelTest'] );
 Route::post('/login',  [PrivateChannelController::class, 'channelTest'] );

 Route::get('/login_another',  [PresenceChannelController::class, 'channelTest'] );
 Route::post('/login_another',  [PresenceChannelController::class, 'channelTest'] );
