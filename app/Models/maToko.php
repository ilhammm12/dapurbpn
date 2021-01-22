<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maToko extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser', 'namaToko','alamat','foto','jam_buka','jam_tutup'
    ];

    protected $primaryKey = 'idToko';
}
