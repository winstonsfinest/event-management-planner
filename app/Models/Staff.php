<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Staff extends BaseModel
{
    protected $table = 'staffs';

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
