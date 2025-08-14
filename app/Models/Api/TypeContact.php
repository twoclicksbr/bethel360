<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;

class TypeContact extends Model
{
    protected $table = 'type_contact';

    protected $fillable = [
        'id_credential',
        'name',
        'mask',
        'active',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
