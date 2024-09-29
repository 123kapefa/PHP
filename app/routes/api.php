<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiLoginController;

//Route::get('post', [PostController::class, 'index']);

Route::post('login', [ApiLoginController::class, 'login'])
    ->name('api name');

Route::middleware ('auth:sanctum')->group (function() {
    Route::get ('posts/getPosts', [PostController::class, 'index']);
    Route::get ('posts/getPost/{id}', [PostController::class, 'show']);
    Route::post ('posts/addPost', [PostController::class, 'store']);
    Route::put ('posts/updatePost/{id}', [PostController::class, 'update']);
    Route::delete ('posts/deletePost/{id}', [PostController::class, 'destroy']);
});

Route::middleware ('auth:sanctum')->group (function() {
    Route::get ('comments/getComments', [CommentController::class, 'index']);
    Route::get ('comments/getComment/{id}', [CommentController::class, 'show']);
    Route::post ('comments/addComment', [CommentController::class, 'store']);
    Route::put ('comments/updateComment/{id}', [CommentController::class, 'update']);
    Route::delete ('comments/deleteComment/{id}', [CommentController::class, 'destroy']);
});
