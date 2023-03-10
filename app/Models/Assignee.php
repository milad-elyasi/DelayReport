<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): belongsTo
    {
        return $this->belongsTo(Agent::class);
    }

    public function order(): belongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
