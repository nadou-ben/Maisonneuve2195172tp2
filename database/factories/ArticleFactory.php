<?php

namespace Database\Factories;
use App\Models\Article as ModelsEtudient;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre'=>$this->faker->sentence,
            'titre_fr'=>$this->faker->sentence,
            'contenu'=>$this->faker->sentence,
            'contenu_fr'=>$this->faker->sentence,
            'date'=>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            'eutidentId'=> ModelsEtudient::inRandomOrder()->first()->id,

        ];
    }
}
