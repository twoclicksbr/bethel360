<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class TypeGender extends Model
{
    protected $table = 'type_gender';

    protected $fillable = [
        'id_credential',
        'name',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
