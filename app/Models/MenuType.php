<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuType extends BaseModel
{
    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
