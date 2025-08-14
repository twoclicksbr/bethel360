<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeGroupPerson extends Model
{
    protected $table = 'theme_group_person';

    protected $fillable = [
        'id_credential',
        'id_theme_group',
        'id_person',
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

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
