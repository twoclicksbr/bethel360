<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    protected $table = 'ministry';

    protected $fillable = [
        'id_credential',
        'id_theme_ministry',
        'name',
        'description',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function theme()
    {
        return $this->belongsTo(ThemeMinistry::class, 'id_theme_ministry');
    }
}
