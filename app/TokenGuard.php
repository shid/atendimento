<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenGuard extends Model
{
    protected $fillable = [
        'name', 'description', 'token', 'status'
    ];
}
