<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends BaseModel
{

    protected $casts = [
        'prep_list' => 'array',
    ];

    public function menu_type(): BelongsTo
    {
        return $this->belongsTo(MenuType::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }
}
