<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = [
        'id_credential',
        'name',
        'birthdate',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
