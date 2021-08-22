<?php

use App\Http\Controllers\DataInputController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});
Route::get('/dynamic-search', function () {
    return Inertia::render('DynamicSearch');
});


//services
Route::get('/services', [ServicesController::class,'index'])->name('services.index');
Route::get('/service/create', [ServicesController::class,'create'])->name('services.create');
Route::post('/service/store', [ServicesController::class,'store'])->name('service.store');
Route::get('/service/{service}/edit', [ServicesController::class,'edit'])->name('service.edit');
Route::put('/service/{service}', [ServicesController::class,'update'])->name('service.update');  
Route::delete('/service/{service}/delete', [ServicesController::class,'destroy'])->name('service.delete');

//images
Route::get('/images', [ImageController::class,'index'])->name('images.index');
Route::get('/image/create', [ImageController::class,'create'])->name('image.create');
Route::post('/image/store', [ImageController::class,'store'])->name('image.store');
Route::get('/image/{image}/edit', [ImageController::class,'edit'])->name('image.edit');
Route::put('/image/{image}', [ImageController::class,'update'])->name('image.update');
Route::delete('/image/{image}/delete', [ImageController::class,'destroy'])->name('image.delete');


// Route::resource('data', DataInputController::class);
// Route::resource('data/{data}', DataInputController::class);