<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;

class TypeAddress extends Model
{
    protected $table = 'type_address';

    protected $fillable = [
        'id_credential',
        'name',
        'active',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
