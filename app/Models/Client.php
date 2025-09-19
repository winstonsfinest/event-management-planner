<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends BaseModel
{
    protected $guarded = ['id'];

    public function event(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
