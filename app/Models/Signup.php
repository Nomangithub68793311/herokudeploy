<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Signup extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $dateFormat = 'Y-m-d';
    protected $guard = 'signup';
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

}
