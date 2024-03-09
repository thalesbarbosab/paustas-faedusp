<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;

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

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/contato', [WebController::class, 'contact'])->name('contact');
Route::post('/contato', [WebController::class, 'storeContact'])->name('contact.store');
Route::get('/pauta/{slug}', [WebController::class, 'rulingDetail'])->name('ruling.detail');
Route::post('/pauta/{ruling_id}/assinar', [WebController::class, 'storeVoting'])->name('ruling.voting.store');
