<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeGroupAttendance extends Model
{
    protected $table = 'theme_group_attendance';

    protected $fillable = [
        'id_credential',
        'id_theme_group_lesson',
        'id_person',
        'present',
        'active',
        'deleted',
    ];

    protected $casts = [
        'present' => 'boolean',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function lesson()
    {
        return $this->belongsTo(ThemeGroupLesson::class, 'id_theme_group_lesson');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
