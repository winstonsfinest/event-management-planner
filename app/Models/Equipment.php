<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends BaseModel
{
    protected $table = 'equipments';

    protected $guarded = ['id'];

    public function menu_items(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }

    public function equipment_type()
    {
        return $this->belongsTo(EquipmentType::class);

    }

    public function section()
    {
        return $this->belongsTo(Section::class);

    }
}
