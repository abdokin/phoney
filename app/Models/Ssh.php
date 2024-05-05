<?php

namespace App\Models;

use App\Traits\IsConnection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ssh extends Model
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
