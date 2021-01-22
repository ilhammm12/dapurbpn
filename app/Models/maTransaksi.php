<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser','tglTransaksi', 'idMenu','alamat','jumlah','totalharga'
    ];

    protected $primaryKey = 'idTransaksi';
}
