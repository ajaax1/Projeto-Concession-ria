<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/vehicles/{slug}',[VehiclesController::class,'vehicles'])->name('vehicles');
Route::post('/vehicles',[VehiclesController::class,'send'])->name('vehicles.send');
Route::post('/newsVehicles/search',[VehiclesController::class,'newsSearch'])->name('newsVehicles.search');
Route::post('/usedVehicles/search',[VehiclesController::class,'usedSearch'])->name('usedVehicles.search');
Route::get('/usedVehicles/search/MaxPrice',[VehiclesController::class,'usedSearchMaxPrice'])->name('usedVehiclesMaxPrice.search');
Route::get('/usedVehicles/search/MinPrice',[VehiclesController::class,'usedSearchMinPrice'])->name('usedVehiclesMinPrice.search');
Route::get('/newsVehicles/search/MaxPrice',[VehiclesController::class,'newsSearchMaxPrice'])->name('newsVehiclesMaxPrice.search');
Route::get('/newsVehicles/search/MinPrice',[VehiclesController::class,'newsSearchMinPrice'])->name('newsVehiclesMinPrice.search');
Route::get('/newsVehicles',[VehiclesController::class,'vehiclesNews'])->name('vehicles.news');
Route::get('/usedVehicles',[VehiclesController::class,'vehiclesUsed'])->name('vehicles.used');
Route::get('/addVehicles',[VehiclesController::class,'add'])->name('add.vehicles');

Route::get('/', function() {
    return view('home');
});
Route::get('/about', function() {
    return view('about');
});
Route::get('/contact', function() {
    return view('contact');
});
