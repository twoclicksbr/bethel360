<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = [
        'id_credential',
        'id_gender',
        'name',
        'birthdate',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function gender()
    {
        return $this->belongsTo(TypeGender::class, 'id_gender');
    }

    public function avatar()
    {
        return $this->hasOne(PersonAvatar::class, 'id_person')
            ->where('deleted', 0)
            ->where('active', 1);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'id_target')
            ->where('target_table', 'person');
    }
}
