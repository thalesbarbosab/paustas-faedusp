<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\HomeController;

use App\Http\Controllers\Cms\User\UserController;
use App\Http\Controllers\Cms\User\ProfileController;

use App\Http\Controllers\Cms\Auth\LoginController;
use App\Http\Controllers\Cms\Auth\ResetPasswordController;
use App\Http\Controllers\Cms\Auth\ForgotPasswordController;

use App\Http\Controllers\Cms\Content\ContentBgController;
use App\Http\Controllers\Cms\Content\ContentHomeController;
use App\Http\Controllers\Cms\Content\SocialMediaController;
use App\Http\Controllers\Cms\Content\ContentContactController;


use App\Http\Controllers\Cms\Ruling\RulingController;
use App\Http\Controllers\Cms\Ruling\RulingPictureController;

/*
|--------------------------------------------------------------------------
| Cms Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/cms/login');
});
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
    Route::any('logout', 'logout')->name('logout');
});
Route::controller(ForgotPasswordController::class)->group(function () {
    Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
});
Route::controller(ResetPasswordController::class)->group(function () {
    Route::get('password/reset', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});
// Authenticated Routes...
Route::middleware(['auth'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::prefix('user')->name('user.')->group(function(){
        Route::patch('/{id}/update', [UserController::class,'update'])->name('update');
        Route::patch('/{id}/update-password', [UserController::class,'updatePassword'])->name('update.password');
        Route::prefix('profile')->name('profile.')->group(function(){
            Route::get('/', [ProfileController::class,'index'])->name('index');
        });
    });
    Route::resource('user',  UserController::class);
    Route::prefix('conteudo')->name('content.')->group(function(){
        Route::prefix('imagens-de-fundo')->name('bg.')->group(function(){
            Route::get('/', [ContentBgController::class,'index'])->name('index');
            Route::put('/', [ContentBgController::class,'update'])->name('update');
            Route::delete('/cabecalho/imagem/remover', [ContentBgController::class,'destroyBgHeaderImage'])->name('header.image.destroy');
            Route::delete('/rodape/imagem/remover', [ContentBgController::class,'destroyBgFooterImage'])->name('footer.image.destroy');
            Route::delete('/logo/imagem/remover', [ContentBgController::class,'destroyBgLogoImage'])->name('logo.image.destroy');
        });
        Route::prefix('pagina-inicial')->name('home.')->group(function(){
            Route::get('/', [ContentHomeController::class,'index'])->name('index');
            Route::delete('/sobre/imagem/remover', [ContentHomeController::class,'destroyHomeAboutImage'])->name('about.image.destroy');
            Route::put('/', [ContentHomeController::class,'update'])->name('update');
        });
        Route::prefix('contato')->name('contact.')->group(function(){
            Route::get('/', [ContentContactController::class,'index'])->name('index');
            Route::put('/', [ContentContactController::class,'update'])->name('update');
        });
        Route::prefix('redes-sociais')->name('social-medias.')->group(function(){
            Route::get('/', [SocialMediaController::class, 'index'])->name('index');
            Route::put('/', [SocialMediaController::class, 'update'])->name('update');
        });
    });
    Route::prefix('pautas')->name('ruling.')->group(function(){
        Route::get('/', [RulingController::class,'index'])->name('index');
        Route::get('novo', [RulingController::class,'create'])->name('create');
        Route::post('/', [RulingController::class,'store'])->name('store');
        Route::get('/{id}/editar', [RulingController::class,'edit'])->name('edit');
        Route::put('/{id}', [RulingController::class,'update'])->name('update');
        Route::delete('/{id}', [RulingController::class,'destroy'])->name('destroy');
        Route::name('picture.')->group(function(){
            Route::get('/{ruling_id}/fotos', [RulingPictureController::class,'index'])->name('index');
            Route::get('/{ruling_id}/fotos/nova', [RulingPictureController::class,'create'])->name('create');
            Route::patch('/{ruling_id}/foto/{ruling_picture_id}/definir-como-padrao', [RulingPictureController::class,'setAsDefault'])->name('set_as_default');
            Route::post('/{ruling_id}/fotos', [RulingPictureController::class,'store'])->name('store');
            Route::delete('/fotos/{id}', [RulingPictureController::class,'destroy'])->name('destroy');
        });
    });
});
