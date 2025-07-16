<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeMinistry extends Model
{
    protected $table = 'theme_ministry';

    protected $fillable = [
        'id_credential',
        'name',
        'label',
        'description',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
