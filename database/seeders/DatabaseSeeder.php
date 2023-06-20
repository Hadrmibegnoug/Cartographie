<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Region::create([
            'nom' => 'Nouakchott',
            'longitude' => '17.977080',
            'latitude' => '-15.972731',
        ]);
        Region::create([
            'nom' => 'Nouadhibou',
            'longitude' => '20.955570',
            'latitude' => '-17.035480',
        ]);
        Region::create([
            'nom' => 'Rosso',
            'longitude' => '16.511770',
            'latitude' => '-15.798700',
        ]);
        Region::create([
            'nom' => 'Nouakchott',
            'longitude' => '18.0724000',
            'latitude' => '-16.0387000',
        ]);
        Region::create([
            'nom' => 'Nouadhibou',
            'longitude' => '20.842',
            'latitude' => '-16.8509',
        ]);
        Region::create([
            'nom' => 'Rosso',
            'longitude' => '16.8325000',
            'latitude' => '-16.5379000',
        ]);
    }
}
