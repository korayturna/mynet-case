<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PersonController;

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
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/person/list', [PersonController::class, 'index'])->name('person');
    Route::any('/person/create', [PersonController::class, 'create'])->name('person.create');
    Route::any('/person/edit/{id}', [PersonController::class, 'edit'])->name('person.edit');
    Route::get('/person/delete/{id}', [PersonController::class, 'destroy'])->name('person.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
