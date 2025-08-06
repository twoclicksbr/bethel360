<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFilterMemory extends Model
{
    protected $table = 'user_filter_memory';

    protected $fillable = [
        'id_credential',
        'id_person',
        'route',
        'full_url',
    ];

    public function credential(): BelongsTo
    {
        return $this->belongsTo(Credential::class, 'id_credential');
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'id_person');
    }
}
