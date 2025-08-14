<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class PersonAvatar extends Model
{
    protected $table = 'person_avatar';

    protected $fillable = [
        'id_credential',
        'id_person',
        'avatar_url',
        'active',
        'deleted',
    ];

    // 🔁 Relacionamentos
    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
