<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class ThemeGroup extends Model
{
    protected $table = 'theme_group';

    protected $fillable = [
        'id_credential',
        'id_type_group',
        'name',
        'description',
        'location',
        'id_person_leader',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function typeGroup()
    {
        return $this->belongsTo(TypeGroup::class, 'id_type_group');
    }

    public function personLeader()
    {
        return $this->belongsTo(Person::class, 'id_person_leader');
    }
}
