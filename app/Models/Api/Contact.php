<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;
use App\Models\Api\TypeContact;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'id_credential',
        'target_table',
        'id_target',
        'id_type_contact',
        'value',
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
        return $this->belongsTo(TypeContact::class, 'id_type_contact');
    }
}
