<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'idToko', 'namaMenu', 'fotoMenu','hargaMenu','stok'
    ];

    protected $primaryKey = 'idMenu';
}
