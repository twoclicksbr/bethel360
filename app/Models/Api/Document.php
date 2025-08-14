<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use App\Models\Api\Credential;
use App\Models\Api\TypeDocument;

class Document extends Model
{
    protected $table = 'document';

    protected $fillable = [
        'id_credential',
        'target_table',
        'id_target',
        'id_type_document',
        'value',
        'active',
        'deleted',
    ];

    public $timestamps = true;

    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class, 'id_type_document');
    }
}
