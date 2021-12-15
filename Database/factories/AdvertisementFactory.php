<?php

namespace Modules\AdvertisementModule\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\AdvertisementModule\Entities\Advertisement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl,
            'is_active' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(1, 20),
            'position' => $this->faker->text,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
