<?php

namespace App\Services;

use App\Models\User;
use App\Events\UserRegistered; // ← импорт события
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //  Генерируем событие
        event(new UserRegistered($user));

        return $user;
    }
}