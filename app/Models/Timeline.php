<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $table = 'timeline';

    protected $primaryKey = 'timeline_id';

    protected $keyType = 'int';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'sites_id',
        'tahun',
        'judul',
        'cerita',
        'foto',
        'urutan',
    ];

    public function site()
    {
        return $this->belongsTo(
            Site::class,
            'sites_id',
            'sites_id'
        );
    }
}