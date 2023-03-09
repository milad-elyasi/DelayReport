<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static UserFactory factory($count = null, $state = [])
 */
class User extends Model
{
    use HasFactory;

    protected $table = 'users';
}
