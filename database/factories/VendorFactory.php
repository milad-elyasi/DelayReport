<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Vendor create($attributes = [], ?Model $parent = null)
 * @method Vendor make($attributes = [], ?Model $parent = null)
 */
class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }

}
