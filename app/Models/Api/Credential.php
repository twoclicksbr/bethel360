<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    protected $table = 'credential';

    protected $fillable = [
        'name',
        'valid',
        'active',
        'deleted',
    ];
}
