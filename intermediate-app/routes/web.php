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

use Illuminate\Support\Facades\View;

Route::get('/', function () {
    $arraySize = 100000;

    // Generate an array of 100,000 random numbers
    $numbers = [];
    for ($i = 0; $i < $arraySize; $i++) {
        $numbers[] = rand(1, 100);
    }

    // Calculate the sum of the array
    $sum = array_sum($numbers);

    // Pass the array and sum to the view
    return View::make('welcome', ['numbers' => $numbers, 'sum' => $sum]);
});
