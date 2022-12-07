<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\ListComentController;
use App\Http\Controllers\AgendaComentController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\AlterPasswordController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\DiarioController;
use App\Http\Controllers\HumorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
    return view('landing-page');
});

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/edit-profile', [EditProfileController::class, 'show'])->name('profile.show');
    Route::put('/edit-profile', [EditProfileController::class, 'update'])->name('profile.update');
    Route::get('/alter-password', [AlterPasswordController::class, 'show'])->name('alter-password.show');
    Route::put('/alter-password', [EditProfileController::class, 'update'])->name('alter-password.update');
});

Route::get('dashboard', [UserController::class, 'show'])->name('dashboard.show');

Route::group(['middleware' => ['auth']], function() {

    // ROTAS HOME
    Route::post('/post',[PostController::class, 'store']);
    Route::delete('/post/{id}',[PostController::class, 'destroy']);
    Route::get('/home',[HomeController::class, 'index']);
    //Rota que retorna uma medida específica do banco de dados
    Route::get('/home/{id}', [PostController::class, 'show']);
    Route::get('/home/profile/{id}', [HomeController::class, 'perfil']);
    Route::get('/comments', [HomeController::class, 'comment'])->name('comentario');
    Route::post('/comentario/{id}', [ComentController::class, 'store'])->name('comentario');
    Route::delete('/comentario/{id}', [ComentController::class, 'destroy'])->name('comentario');

    //ROTAS PERFIL
    Route::get('/profile/{id}', [ProfileController::class, 'perfil']);
    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::get('/profile/feed/{id}', [HomeController::class, 'show']);
    Route::get('/profile', [HomeController::class, 'profile'])->name('auth.profile');
    Route::get('/edit-profile/foto', function () {
        return view('auth.user-photo');
    });
    Route::put('/edit-profile/update/foto/{id}',[RegisteredUserController::class, 'update_avatar']);

    //ROTAS AGENDA
    Route::post('/comentarioagenda/{id}', [AgendaComentController::class, 'store'])->name('comentarioagenda');
    Route::delete('/comentarioagenda/{id}', [AgendaComentController::class, 'destroy'])->name('comentarioagenda');
    Route::get('/agenda', [HomeController::class, 'agenda']); 
    Route::post('/agenda',[AgendaController::class, 'store']);
    Route::delete('/agenda/{id}',[AgendaController::class, 'destroy']);
    Route::get('/agenda/edit/{id}',[AgendaController::class, 'edit']);
    Route::put('agenda/update/{id}',[AgendaController::class, 'update']);

     /** ROTAS DAS LISTAS */
    // Route::get('/lista', 'HomeController@list')->name('home.list');
    Route::post('/comentariolista/{id}', [ListComentController::class, 'store'])->name('comentariolista');
    Route::delete('/comentarioagenda/{id}', [AgendaComentController::class, 'destroy'])->name('comentarioagenda');
    Route::get('/lista', [HomeController::class, 'list']); 
     Route::post('/lista',[ListController::class, 'store']);
     Route::delete('/lista/{id}',[ListController::class, 'destroy']);
     Route::get('/lista/edit/{id}',[ListController::class, 'edit']);
     Route::put('lista/update/{id}',[ListController::class, 'update']);

      /** ROTAS DO DIARIO */
      Route::get('/diario',[HomeController::class, 'diario']);
      Route::post('/diario',[DiarioController::class, 'store']);
      Route::delete('/diario/{id}',[DiarioController::class, 'destroy']);
      Route::get('/diario/edit/{id}',[DiarioController::class, 'edit']);
      Route::put('diario/update/{id}',[DiarioController::class, 'update']);

        /** ROTAS HUMOR */
        Route::post('/humor',[HumorController::class, 'store']);
        Route::delete('/humor/{id}',[HumorController::class, 'destroy']);
        Route::get('/humor', [HomeController::class, 'humor']); 
        Route::put('/{id}',[DiarioController::class, 'update']);

});

require __DIR__.'/auth.php';
