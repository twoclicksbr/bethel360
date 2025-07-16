<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeCelebrationParticipation extends Model
{
    protected $table = 'theme_celebration_participation';

    protected $fillable = [
        'id_credential',
        'id_theme_celebration_occurrence',
        'id_ministry',
        'id_person',
        'role',
        'entry_at',
        'exit_at',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function occurrence()
    {
        return $this->belongsTo(ThemeCelebrationOccurrence::class, 'id_theme_celebration_occurrence');
    }

    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'id_ministry');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
