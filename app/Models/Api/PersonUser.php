<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class PersonUser extends Model
{
    protected $table = 'person_user';

    protected $fillable = [
        'id_credential',
        'id_person',
        'email',
        'password',
        'active',
        'deleted',
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
