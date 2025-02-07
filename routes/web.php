<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DefinitionVoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DefinitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/autocomplete', [SearchController::class, 'autoComplete'])->name('autocomplete');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/term/{term}', [TermController::class, 'term'])->name('term');
Route::get('/termStartsWith', [TermController::class, 'termStartsWith'])->name('termStartsWith');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/userdefinitions', [DefinitionController::class, 'userDefinitions'])->name('userDefinitions');
    Route::get('/userTerm/{term}', [TermController::class, 'userTerm'])->name('userTerm');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/approve', [ApprovalController::class, 'approve'])->name('approve');
    Route::post('/approve/{id}', [ApprovalController::class, 'approveDefinition'])->name('approve.update');

    Route::resource('definitions', DefinitionController::class);
    Route::post('definition/{definition}/upvote', [DefinitionVoteController::class, 'upvote'])->name('definition.upvote');
    Route::post('definition/{definition}/downvote', [DefinitionVoteController::class, 'downvote'])->name('definition.downvote');
    Route::delete('definition/{definition}/unvote', [DefinitionVoteController::class, 'unvote'])->name('definition.unvote');

    Route::get('/account', [ProfileController::class, 'account'])->name('account');

    Route::delete('/logout', [SessionController::class,  'destroy']);
});



Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class,  'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class,  'store']);

    Route::get('/login', [SessionController::class,  'create'])->name('login');
    Route::post('/login', [SessionController::class,  'store']);
});


Auth::routes();
