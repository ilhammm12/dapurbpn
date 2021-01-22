<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class maUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email','password','alamat','no_hp'
    ];
    protected $primaryKey = 'id';
}
