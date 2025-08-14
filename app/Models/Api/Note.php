<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;

class Note extends Model
{
    protected $table = 'note';

    protected $fillable = [
        'id_credential',
        'target_table',
        'id_target',
        'note',
        'created_by',
        'visible_to_user',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }
}
