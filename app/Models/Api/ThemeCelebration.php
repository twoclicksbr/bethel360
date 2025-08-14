<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeCelebration extends Model
{
    protected $table = 'theme_celebration';

    protected $fillable = [
        'id_credential',
        'name',
        'description',
        'weekday',
        'start_time',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
