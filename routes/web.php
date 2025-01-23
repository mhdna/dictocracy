<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DefinitionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DefinitionController::class, 'home']);
Route::get('/autocomplete', [SearchController::class, 'autoComplete'])->name('autocomplete');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/index', [DefinitionController::class, 'index']);
Route::get('/term/{term}', [DefinitionController::class, 'term']);

Route::get('/user/{user_id}', [ProfileController::class, 'profile']);

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'account'])->name('account');
});

// });

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class,  'create']);
    Route::post('/register', [RegisteredUserController::class,  'store']);

    Route::get('/login', [SessionController::class,  'create']);
    Route::post('/login', [SessionController::class,  'store']);
});

Route::get('/logout', function () {
    return redirect('/'); // TODO 404 page
})->middleware('auth');
Route::delete('/logout', [SessionController::class,  'destroy'])->middleware('auth');
