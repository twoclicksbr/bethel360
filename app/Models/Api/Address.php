<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;
use App\Models\Api\TypeAddress;

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'id_credential',
        'target_table',
        'id_target',
        'id_type_address',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'country',
        'main',
        'active',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function type()
    {
        return $this->belongsTo(TypeAddress::class, 'id_type_address');
    }
}
