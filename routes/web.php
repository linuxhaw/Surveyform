<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('survey/survey');
});

Route::post("surveys/{survey:uuid}/answer", [SurveyController::class, "answer"])->name("surveys.answer");
Route::get('surveys/{survey:uuid}/thank-you', [SurveyController::class, 'thankYou'])->name('surveys.thankyou');
Route::resource("surveys", SurveyController::class);
Route::get("surveys/{survey:uuid}", [SurveyController::class, "show"])->name("surveys.show");
