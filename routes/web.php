<?php

use App\Http\Livewire\Annonces;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/annonces', Annonces::class)->except('index');
Route::get('/', [Annonces::class, 'index'])->name('annonces.index');

Route::middleware(['auth', 'role:Migrant'])->group(function(){

});

Route::middleware(['auth', 'role:Admin'])->group(function(){

});

Route::middleware(['auth', 'role:Association'])->group(function(){

});

Route::middleware(['auth', 'role:Propriétaire'])->group(function(){

});