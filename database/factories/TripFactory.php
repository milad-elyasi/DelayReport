<?php

namespace Database\Factories;

use App\Models\Trip;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Vendor create($attributes = [], ?Model $parent = null)
 * @method Vendor make($attributes = [], ?Model $parent = null)
 */
class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition(): array
    {
        return [
            'order_id' => $this->faker->name,
            'status' => 'assigned'
        ];
    }

    public function delivered(): TripFactory
    {
        return $this->state([
            'status' => 'Assigned'
        ]);
    }

}
