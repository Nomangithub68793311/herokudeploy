<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signup extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $dateFormat = 'Y-m-d';
    protected $hidden = [
        'password',
        'remember_token',
    ];

}
