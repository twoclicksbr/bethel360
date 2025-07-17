<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeGroupMaterial extends Model
{
    protected $table = 'theme_group_material';

    protected $fillable = [
        'id_credential',
        'id_theme_group',
        'title',
        'id_file',
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

    public function file()
    {
        return $this->belongsTo(File::class, 'id_file');
    }
}
