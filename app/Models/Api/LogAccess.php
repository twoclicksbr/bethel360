<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class LogAccess extends Model
{
    protected $table = 'log_access';

    protected $fillable = [
        'id_credential',
        'id_person',
        'action',
        'ip',
        'user_agent',
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
