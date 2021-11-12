<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $logo = "/upload/easyschool.png";
        return [
            'name' => $this->faker->streetName(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'logo'=> $logo,
            'email' => $this->faker->email()
        ];
    }
}
