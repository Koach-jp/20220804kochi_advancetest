<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition()
    {
        $gender = rand(1,2);
        if ($gender == 1) {
            $firstName = $this->faker->firstNameMale();
        } else {
            $firstName = $this->faker->firstNameFemale();
        }
        return [
            'fullname' => $this->faker->lastName().$firstName,
            'gender' => $gender,
            'email' => $this->faker->safeEmail(),
            'postcode' => substr_replace($this->faker->postcode(), '-', 3, 0),
            'address' => $this->faker->prefecture().$this->faker->streetAddress(),
            'building_name' => $this->faker->secondaryAddress(),
            'opinion' => $this->faker->realTextBetween(30, 120, 5),
            'created_at' => $this->faker->dateTimeBetween('now', '+3 days'),
        ];
    }
}
