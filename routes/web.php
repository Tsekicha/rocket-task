<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\NewItemController;

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
    return view('index');
});

Route::get('/show-cv', function () {
    return view('index');
})->name("cv.show");

Route::get('/university-options', [UniversityController::class, 'getUniversityOptions']);
Route::get('/technology-options', [TechnologyController::class, 'getTechnologyOptions']);

Route::resource('cv', CVController::class)->names([
    'create' => 'cv.create',
    'index' => 'cv.index',
]);

Route::post('/add-technology', [NewItemController::class, 'addTechnology'])->name('cv.addTechnology');
Route::post('/add-university', [NewItemController::class, 'addUniversity'])->name('cv.addUniversity');
Route::get('/fetch-cv-data', [CVController::class, 'fetchCVData'])->name('cv.fetchCVData');
Route::get('/second-page', [CVController::class, 'showSecondPage'])->name('second-page');
