<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Events\TestEvent;



// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Маршруты регистрации
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/', function () {
    return view('welcome');
});

// Тестовая страница для WebSocket
Route::get('/ws-test', function () {
    return view('websocket-test');
});

// Маршрут для отправки тестового события
Route::post('/test-broadcast', function () {
    event(new TestEvent('Привет от сервера! ' . now()->format('H:i:s')));
    return response()->json(['status' => 'ok']);
});