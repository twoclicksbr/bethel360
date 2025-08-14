<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;

class File extends Model
{
    protected $table = 'file';

    protected $fillable = [
        'id_credential',
        'target_table',
        'id_target',
        'name',
        'path',
        'type',
        'size',
        'description',
        'active',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
