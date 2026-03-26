<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PositionController;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $roomCount = Room::count();
    $userCount = User::count();
    return view('welcome', compact('roomCount', 'userCount'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::resource('positions', PositionController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::resource('rooms', RoomController::class)->except(['show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route('users.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/positions/{position}/users', [PositionController::class, 'users'])->name('positions.users');

Route::get('/rooms/{room}/entries', [RoomController::class, 'entries'])->name('rooms.entries');


require __DIR__.'/auth.php';