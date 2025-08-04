<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class LogOperation extends Model
{
    protected $table = 'log_operation';

    protected $fillable = [
        'id_credential',
        'id_person',
        'module',
        'action',
        'details',
        'deleted',
        'active',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    // Relacionamentos padrão Bethel360
    public function credential()
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
