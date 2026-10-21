<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $primaryKey = 'galeri_id';

    protected $keyType = 'int';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'sites_id',
        'foto',
        'keterangan',
        'urutan',
    ];

    /**
     * Relasi galeri dengan situs.
     */
    public function site()
    {
        return $this->belongsTo(
            Site::class,
            'sites_id',
            'sites_id'
        );
    }
}