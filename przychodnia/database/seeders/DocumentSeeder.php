<?php

namespace Database\Seeders;

use App\Models\Document;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    protected $model = Document::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        // Tworzenie przykładowych dokumentów
        for ($i = 0; $i < 10; $i++) {
            Document::create([
                'Type' => $faker->word,
                'DoctorId' => $faker->numberBetween(1, 10),
                'PatientId' => $faker->numberBetween(1, 10),
                'IssueDate' => $faker->dateTimeBetween('-1 year', 'now'),
                'Signature' => $faker->lexify('??????????'),
            ]);
        }
    }
}
