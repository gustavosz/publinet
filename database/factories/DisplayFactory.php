<?php

namespace Database\Factories;

use App\Models\Display;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisplayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Display::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'latitude'  => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'type'      => $this->faker->randomElement(['indoor', 'outdoor']),
            'price'     => $this->faker->randomFloat(2, 0, 999)
        ];
    }
}
