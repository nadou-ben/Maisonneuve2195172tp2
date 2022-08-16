<?php

namespace Database\Factories;
use App\Models\Article as ModelsEtudient;

use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre'=>$this->faker->name(),
            'titre_fr'=>$this->faker->name(),
            'file_path'=>$this->faker->sentence,
            'file_path_fr'=>$this->faker->sentence,
            'eutidentId'=> ModelsEtudient::inRandomOrder()->first()->id,
            
        ];
    }
}
