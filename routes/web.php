<?php

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


Route::get('send-mail', function () {

    $details = [
        'title' => 'Mail from Wesley sinde',
        'body' => 'This is for testing email using smtp'
    ];

    \Mail::to('sindewesley5@gmail.com')->send(new \App\Mail\MyDemoMail($details));

    dd("Email is Sent.");
});
