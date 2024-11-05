<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return abort(404);
});

Route::get('/job/query-results', [JobController::class, 'getQueryResults']);