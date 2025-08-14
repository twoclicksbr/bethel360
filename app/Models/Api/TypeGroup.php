<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class TypeGroup extends Model
{
    protected $table = 'type_group';

    protected $fillable = [
        'id_credential',
        'name',
        'mask',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
