<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/subjects');
});

Route::resource('subjects', 'SubjectController');
Route::resource('activities', 'ActivityController');