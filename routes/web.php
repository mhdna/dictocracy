<?php

use App\Http\Controllers\DefinitionVoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DefinitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::redirect('/', '/home');
Route::get('/', [DefinitionController::class, 'index'])->name('home');

Route::get('/autocomplete', [SearchController::class, 'autoComplete'])->name('autocomplete');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/term_id', [DefinitionController::class, 'term_id']);
Route::get('/term/{term}', [DefinitionController::class, 'term']);

Route::get('/user/{user_id}', [ProfileController::class, 'profile']);
// Route::post('definitions', [DefinitionController::class, 'store'])->name('definitions.store');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('definitions', DefinitionController::class);

    Route::post('definition/{definition}/upvote', [DefinitionVoteController::class, 'upvote'])->name('definition.upvote');
    Route::post('definition/{definition}/downvote', [DefinitionVoteController::class, 'downvote'])->name('definition.downvote');
    Route::delete('definition/{definition}/unvote', [DefinitionVoteController::class, 'unvote'])->name('definition.unvote');

    // Route::get('/define', [DefinitionController::class, 'create']);
    Route::get('/account', [ProfileController::class, 'account'])->name('account');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class,  'create']);
    Route::post('/register', [RegisteredUserController::class,  'store']);

    Route::get('/login', [SessionController::class,  'create'])->name('login');
    Route::post('/login', [SessionController::class,  'store']);
});

Route::get('/logout', function () {
    return redirect('/'); // TODO 404 page
})->middleware('auth');
Route::delete('/logout', [SessionController::class,  'destroy'])->middleware('auth');

Auth::routes();
