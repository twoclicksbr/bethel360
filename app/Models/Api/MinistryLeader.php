<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class MinistryLeader extends Model
{
    protected $table = 'ministry_leader';

    protected $fillable = [
        'id_credential',
        'id_ministry',
        'id_person',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function ministry()
    {
        return $this->belongsTo(Ministry::class, 'id_ministry');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
