<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\QueroAdotarController;
use App\Http\Controllers\QueroAjudarController;
use App\Http\Controllers\QueroDoarController;
use App\Models\MaisDetalhes;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::controller(QueroDoarController::class)->group(function () {
    Route::get('/quero_doar', 'queroDoar')->name('quero_doar');
    Route::post('/quero_doar', 'cadastroDoacao')->name('cadastro_doacao');
});

Route::controller(QueroAdotarController::class)->group(function () {
    Route::get('/quero_adotar', 'queroAdotar')->name('quero_adotar');
    Route::get('/mais_detalhes/{pet_id}', 'maisDetalhes')->name('mais_detalhes');
    Route::get('/delete/{pet_id}', 'removerPet')->name('delete');
});

Route::get('/quero_ajudar', [QueroAjudarController::class, 'queroAjudar'])->name('quero_ajudar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
