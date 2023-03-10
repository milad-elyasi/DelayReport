<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public function trip(): HasOne
    {
        return $this->hasOne(Trip::class);
    }

    public function delayReport(): HasMany
    {
        return $this->hasMany(DelayReport::class);
    }
}
