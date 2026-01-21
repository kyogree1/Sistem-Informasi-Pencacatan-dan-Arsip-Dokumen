<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', function() {
    return view('welcome', ['title' => 'Welcome Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

Route::get('/archive', function () {
    return view('archive', ['title' => 'Archive Page']);
});

// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

// logout
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');

// routes/web.php
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'title' => 'Dashboard',
        ]);
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/contact', function () {
        return view('contact', [
            'title' => 'contact',
        ]);
    })->name('contact');
});
