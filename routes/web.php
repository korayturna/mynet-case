<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PersonController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Frontend\ListingController;

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

Route::get('/', [ListingController::class, 'index'])->name('listing.index');

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/person/list', [PersonController::class, 'index'])->name('person');
    Route::any('/person/create', [PersonController::class, 'create'])->name('person.create');
    Route::any('/person/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::get('/person/delete/{id}', [PersonController::class, 'destroy'])->name('person.delete');
    Route::any('/adress/create/{id}', [AddressController::class, 'create'])->name('address.create');
    Route::get('/adress/show/{id}', [AddressController::class, 'show'])->name('address.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';