<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class MinistryCampus extends Model
{
    protected $table = 'ministry_campus';

    protected $fillable = [
        'id_ministry',
        'id_campus',
    ];

    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'id_ministry');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'id_campus');
    }
}
