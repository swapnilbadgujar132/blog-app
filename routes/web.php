<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::resource('posts', PostController::class);
Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');