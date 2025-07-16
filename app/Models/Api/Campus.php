<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = [
        'id_credential',
        'name',
        'active',
        'deleted',
    ];

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
