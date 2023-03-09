<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Trip extends Model
{
    use HasFactory;

    public const STATUSES = ['assigned', 'at_vendor', 'picked', 'delivered'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
