<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method User create($attributes = [], ?Model $parent = null)
 * @method User make($attributes = [], ?Model $parent = null)
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        $mobile = $this->faker->unique()->e164PhoneNumber();
        return [
            'uuid' => $this->faker->uuid(),
            'username' => $mobile,
            'mobile' => $mobile,
            'remember_token' => 'foo',
            'voximplant_password' => 'bar',
            'lastlocation' => 'Tehran',
            'skyroom_userid' => 'buzz',
        ];
    }
}
