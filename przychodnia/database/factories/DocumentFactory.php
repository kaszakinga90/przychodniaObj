<?php

namespace Database\Factories;

use App\Models\Document;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'Type' => $this->faker->randomElement(['recepta', 'skierowanie']),
            'DoctorId' => $this->faker->randomElement([1, 3, 4, 5, 7]),
            'PatientId' => $this->faker->randomElement([1, 5, 13]),
            'IssueDate' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Signature' => $this->faker->lexify('??????????'),
        ];
    }
}
