<?php

namespace Database\Factories;

use App\Models\Ville as ModelsVille;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtudientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=> $this->faker->name(),
            'adresse'=>$this->faker->sentence,
            'phone'=>$this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail(),
            'date_naissance'=>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            'villeId'=> ModelsVille::inRandomOrder()->first()->id,
        ];
        
    }
}
