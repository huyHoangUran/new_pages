<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SendMailController;

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

Route::get('/', [PostController::class, 'show_post'])
        ->name('client.home');
Route::middleware('checkadmin')->prefix('admin')->group(function () {
    Route::get('index', [CategoryController::class, 'index'])
        ->name('admin.index');
    Route::prefix('user')->group(function () {
        Route::get('list', [UserController::class, 'index'])
            ->name('admin.user.list');
        Route::get('create', [UserController::class, 'create'])
            ->name('admin.user.create');
        Route::post('store', [UserController::class, 'store'])
            ->name('admin.user.store');
    });

    Route::prefix('category')->group(function () {
        Route::get('list', [CategoryController::class, 'index'])
            ->name('admin.category.list');
        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])
            ->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])
            ->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])
            ->name('admin.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');
    });

    Route::prefix('post')->group(function () {
        Route::get('list', [PostController::class, 'index'])
            ->name('admin.post.list');
        Route::get('create', [PostController::class, 'create'])
            ->name('admin.post.create');
        Route::post('store', [PostController::class, 'store'])
            ->name('admin.post.store');
        Route::get('edit/{id}', [PostController::class, 'edit'])
            ->name('admin.post.edit');
        Route::put('update', [PostController::class, 'update'])
            ->name('admin.post.update');
        Route::get('update_status', [PostController::class, 'update_status'])
            ->name('admin.post.update_status');
        Route::get('delete/{id}', [PostController::class, 'delete'])
            ->name('admin.post.delete');
    });

    Route::prefix('comment')->group(function () {
        Route::get('list', [CommentController::class, 'index'])
            ->name('admin.comment.list');
        Route::get('edit/{id}', [CommentController::class, 'edit'])
            ->name('admin.comment.edit');
        Route::post('update/{id}', [CommentController::class, 'update'])
            ->name('admin.comment.update');
        Route::get('update_status', [CommentController::class, 'update_status'])
            ->name('admin.comment.update_status');
        Route::get('delete/{id}', [CommentController::class, 'delete'])
            ->name('admin.comment.delete');
    });
});

Route::prefix(('user'))->group(function() {
    Route::get('login_form', [UserController::class, 'login_form'])
        ->name('user.login_form');
    Route::post('login', [UserController::class, 'login'])
        ->name('user.login');
    Route::get('register', [UserController::class, 'register'])
        ->name('user.register');
    Route::post('store', [UserController::class, 'store'])
        ->name('user.store');
    Route::get('logout', [UserController::class, 'logout'])
        ->name('user.logout');
});

Route::prefix(('client'))->group(function() {
    Route::get('/', [PostController::class, 'show_post'])
        ->name('client.home');
    Route::get('/detail_post/{id}', [PostController::class, 'detail_post'])
        ->name('client.detail_post');
    Route::post('store', [CommentController::class, 'store'])
        ->name('client.comment.store');
    Route::get('user_create_post', [PostController::class, 'user_create_post'])
        ->name('client.user_create_post');
    Route::post('user_store', [PostController::class, 'user_store'])
        ->name('client.user_store');
    Route::get('post_category/{id}', [PostController::class, 'post_category'])
        ->name('client.post_category');
    Route::post('search', [PostController::class, 'search'])
        ->name('client.search');
});

// Route::get('send_mail/{id}', [SendMailController::class, 'send_mail']);