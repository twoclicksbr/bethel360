<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeCelebrationOccurrence extends Model
{
    protected $table = 'theme_celebration_occurrence';

    protected $fillable = [
        'id_credential',
        'id_theme_celebration',
        'starts_at',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function celebration()
    {
        return $this->belongsTo(ThemeCelebration::class, 'id_theme_celebration');
    }
}
