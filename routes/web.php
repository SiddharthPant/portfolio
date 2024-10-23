<?php

use App\Http\Controllers\ProfileController;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Support\PostStatusEnum;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'posts' => PostResource::collection(
            Post::where('status', PostStatusEnum::PUBLISHED)
                ->with('tags')
                ->latest()
                ->paginate(10)
        ),
    ]);
})->name('index');

Route::get('/posts/{post:slug}', function (Post $post) {
    return Inertia::render('Post/Show', [
        'post' => fn () => PostResource::make($post)->withBody(),
    ]);
})->name('posts.show');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/uses', function () {
    return Inertia::render('Uses');
})->name('uses');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
