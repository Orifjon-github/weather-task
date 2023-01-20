<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = json_decode(Storage::disk('local')->get('cities/uz.json'));
        foreach ($cities as $city) {
            City::create([
                'name' => $city->city,
                'longitude' => $city->lng,
                'latitude' => $city->lat
            ]);
        }
    }
}
