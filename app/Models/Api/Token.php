<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'token';

    protected $fillable = [
        'id_credential',
        'id_person',
        'token',
        'expires_at',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
