<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->company,
            'address'=> $this->faker->streetAddress,
            'address2'=> "số nhà ".$this->faker->buildingNumber,
            'district'=> $this->faker->city,
            'city'=> $this->faker->city,
            'country'=> "Việt Nam",
            'zipcode'=> $this->faker->postcode,
            'phone'=> $this->faker->phoneNumber,
            'email'=> $this->faker->email,
            'logo'=> $this->faker->imageUrl(),
//            $this->faker->boolean?
        ];
    }
}
