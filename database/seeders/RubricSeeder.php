<?php

namespace Database\Seeders;

use App\Models\Admin\Rubric\Rubric;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 24; $i++) {
            Rubric::create([
                'title' => $faker->sentence,
                'url' => $faker->slug,
                'image_url' => $faker->imageUrl(),
                'description' => $faker->paragraph,
                'meta_title' => $faker->sentence,
                'meta_keywords' => $faker->words(3, true),
                'meta_desc' => $faker->paragraph,
                'sort' => $faker->numberBetween(1, 100),
                'seo_title' => $faker->sentence,
                'seo_alt' => $faker->sentence,
            ]);
        }
    }
}
