<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

Route::post('/post/image/{postId}', [PostImageController::class, 'store'])->name('post.image.store');

// // 通常のSQLを使用するケース
// Route::get('/posts2', [PostController::class, 'indexNormalSql']);
// Route::post('/posts2/create', [PostController::class, 'createPostWithNormalSql']);
// Route::post('/posts2/update', [PostController::class, 'updatePostWithNormalSql']);
// Route::post('/posts2/delete', [PostController::class, 'deletePostWithNormalSql']);

// // クエリビルダを使用するケース
// Route::get('/posts3', [PostController::class, 'getPostsWithQueryBuilder']);
// Route::post('/posts3/create', [PostController::class, 'createPostWithQueryBuilder']);
// Route::post('/posts3/update', [PostController::class, 'updatePostWithQueryBuilder']);
// Route::get('/posts3/user', [PostController::class, 'getPostAndUserWithQueryBuilder']);
// Route::get('/posts3/subquery', [PostController::class, 'getPostWithQueryBuilderBySubQuery']);

// // Eloquentを使用するケース
// Route::get('/posts4', [PostController::class, 'getPostsWithEloquent']);
// Route::get('/posts4/{id}', [PostController::class, 'getPostsWithEloquentById']);

// // リレーションケース
// Route::get('/user/{id}', function ($id) {
//     return User::getUserWithPostsById($id);
// });
