<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DelayReport extends Model
{
    use HasFactory;

    public const STATUSES = ['ETA', 'QUEUE', 'SOLVED'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
