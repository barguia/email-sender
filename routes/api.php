<?php

use App\Http\Controllers\EmailSenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::post('send-email', [EmailSenderController::class, 'send'])
->name('send-email');
#->middleware('recaptcha');
