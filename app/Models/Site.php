<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    protected $primaryKey = 'sites_id';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $fillable = [
        'nama_situs',
        'deskripsi',
        'sejarah',
        'tahun',
        'jenis_situs',
        'alamat',
        'latitude',
        'longitude',
        'status',
    ];
}