<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/', function (Request $request) {
    $request->session()->forget('inquiry');
    return view('index');
});

Route::get('inquiry', function () {
    return view('inquiry');
});

Route::group(['prefix'=>'contact'], function() {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('confirm', [ContactController::class, 'confirm']);
    Route::post('create', [ContactController::class, 'create']);
    Route::post('show', [ContactController::class, 'show']);
    Route::get('show', [ContactController::class, 'show'])->name('getShow');
    Route::post('delete/{contact}', [ContactController::class, 'delete']);
});