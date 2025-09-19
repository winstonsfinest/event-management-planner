<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends BaseModel
{
    use SoftDeletes;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function staffs(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class);
    }

    public function menu_items(): BelongsToMany
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function equipments(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class);
    }

}
