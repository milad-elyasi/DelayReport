<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static UserFactory factory($count = null, $state = [])
 */
class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function orders(): HasMany
    {
        return $this->hasMany(Assignee::class);
    }
}
