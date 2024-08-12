<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\Frontend\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route vers la page des propriétés
Route::get('/proprietes',[\App\Http\Controllers\Frontend\PropertyController::class, 'index'])->name('frontend.property.index');
Route::get('/proprietes/{slug}-{property}', [\App\Http\Controllers\Frontend\PropertyController::class, 'show'])
    ->name('frontend.property.show')
    ->where(['slug' => '[a-z0-9-]+', 'property' => '[0-9]+']);
    Route::post('/biens/{property}/contact',[\App\Http\Controllers\Frontend\PropertyController::class, 'contact'])
    ->name('frontend.property.contact');


// Route vers la page des services
Route::get('/services', function () {
    return view('frontend.services');

})->name('services');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function(){



});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/properties', PropertyController::class);
    Route::resource('/options', OptionController::class);



});

require __DIR__.'/auth.php';
