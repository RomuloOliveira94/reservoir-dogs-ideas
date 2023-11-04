<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

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

//aqui definimos as rotas para entregar o front.

Route::get('/', [DashboardController::class, 'index'] )->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'] );
Route::post('/ideas', [IdeaController::class, 'store'] )->name('ideas.create');
Route::get('ideas/{idea}', [IdeaController::class, 'show'] )->name('ideas.show');
Route::get('ideas/{idea}/edit', [IdeaController::class, 'edit'] )->name('ideas.edit');
Route::put('ideas/{idea}', [IdeaController::class, 'update'] )->name('ideas.update');
Route::delete('ideas/{idea}', [IdeaController::class, 'destroy'] )->name('ideas.destroy');

Route::post('/ideas/{idea}/comments', [CommentController::class,'store'] )->name('ideas.comments.store');
Route::delete('/ideas/{idea}/comments', [CommentController::class,'destroy'] )->name('ideas.comments.destroy');

Route::get('/terms', function(){
    return view('terms');
});
