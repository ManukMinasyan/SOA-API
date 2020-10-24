<?php

namespace Database\Factories;

use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Data::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'page_uuid' => $this->faker->uuid,
            'page_name' => $this->faker->state.' '.$this->faker->jobTitle,
            'page_content' => $this->faker->realText(400, 2),
        ];
    }
}
