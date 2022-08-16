<?php

namespace Database\Factories;

use App\Models\Ville as ModelsVille;
use App\Models\Article as ModelsArticle;

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
            'adresse'=>$this->faker->sentence,
            'phone'=>$this->faker->phoneNumber,
            'date_naissance'=>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            'villeId'=> ModelsVille::inRandomOrder()->first()->id,
            'articleId'=> ModelsArticle::inRandomOrder()->first()->id,
        ];
        
    }
}
