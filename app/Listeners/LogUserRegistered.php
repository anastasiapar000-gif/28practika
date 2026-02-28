<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Log;

class LogUserRegistered
{
    public function handle(UserRegistered $event): void
    {
        Log::info('Пользователь зарегистрирован через событие!', [
            'id' => $event->user->id,
            'email' => $event->user->email,
        ]);
    }
}