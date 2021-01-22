<?php

namespace App\Models;
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class maPengguna extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'ma_penggunas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password', 'alamat','no_hp',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
