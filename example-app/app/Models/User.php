<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $table = 'user';
    protected $guarded = [];

    public static function register(array $data)
    {
        $user = static::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return $user;
    }

    use Notifiable;
}


