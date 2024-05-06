<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\IsConnection;

class Smtp extends Model
{
    use HasFactory,IsConnection;
    protected $fillable = [
        'remoteAddr',
        'username',
        'password',
        'client_version',
        'pwned'
    ];
    protected $appends = ['tries_to_pwned', 'time_to_powned'];
}
