<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/hello', [HelloController::class, 'index']);
 
 Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
 
 Route::get('/posts/create', [PostController::class, 'create'])->name('posts.index')->middleware('auth');
 
 Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
 
 Route::get('/posts/{id}', [PostController::class, 'show']);
 
 Route::get('/requests/create', [RequestController::class, 'create']);
 
 Route::post('/requests/confirm', [RequestController::class, 'confirm'])->name('requests.confirm');
 
 Route::get('/responses', [ResponseController::class, 'index']);
 
 Route::get('/sign-in', [SignInController::class, 'create']);
 
 Route::post('/sign-in', [SignInController::class, 'store'])->name('sign-in.store');
 
 Route::get('/cookies', [CookieController::class, 'index']);
 
 Route::get('/cookies/create', [CookieController::class, 'create'])->name('cookies.create');
 
 Route::post('/cookies/store', [CookieController::class, 'store'])->name('cookies.store');
 
 Route::delete('/cookies/destroy', [CookieController::class, 'destroy'])->name('cookies.destroy');
 
 Route::get('/sessions', [SessionController::class, 'index']);
 
 Route::get('/sessions/create', [SessionController::class, 'create'])->name('sessions.create');
 
 Route::post('/sessions/store', [SessionController::class, 'store'])->name('sessions.store');
 
 Route::delete('/sessions/destroy', [SessionController::class, 'destroy'])->name('sessions.destroy');

});

require __DIR__.'/auth.php';
