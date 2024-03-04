<?php

namespace App\Notifications\User;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordLaravel;

class ResetPassword extends ResetPasswordLaravel
{
    public static $createUrlCallback = 'static::createUrl';

    public function createUrl($notifiable, $token)
    {
        return url(route('cms.password.reset', [
            'token' => $token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
    }
}
