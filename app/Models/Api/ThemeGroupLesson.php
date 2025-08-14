<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeGroupLesson extends Model
{
    protected $table = 'theme_group_lesson';

    protected $fillable = [
        'id_credential',
        'id_theme_group',
        'title',
        'description',
        'date',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function themeGroup()
    {
        return $this->belongsTo(ThemeGroup::class, 'id_theme_group');
    }
}
