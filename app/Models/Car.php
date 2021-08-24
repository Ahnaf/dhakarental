<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin(): BelongsTo
    {
        return $this->BelongsTo(Admin::class, 'created_by', 'id');
    }

    public function attachment(): HasMany
    {
        return $this->hasMany(Carattach::class, 'car_id', 'id');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(Cargallery::class, 'car_id', 'id');
    }
}
