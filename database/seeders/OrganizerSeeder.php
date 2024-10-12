<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrganizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $organizers  = [
            [
                'name' => 'Southern Sydney University',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/SSU',
                'x_link' => 'https://x.com/SSU',
                'website_link' => 'https://SSU.co.id',
            ],
            [
                'name' => 'MSW Global',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/MSWGlobal',
                'x_link' => 'https://x.com/MSWGlobal',
                'website_link' => 'https://MSWGlobal.co.id',
            ],
            [
                'name' => 'Debindo',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/Debindo',
                'x_link' => 'https://x.com/debindo',
                'website_link' => 'https://Debindo.com',
            ],
            [
                'name' => 'HW Group',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/HWGroup',
                'x_link' => 'https://x.com/HWGroup',
                'website_link' => 'https://HWGroup.com',
            ],
            [
                'name' => 'OBK Group',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/OBKGroup',
                'x_link' => 'https://x.com/OBKGroup',
                'website_link' => 'https://OBKGroup.com',
            ],
            [
                'name' => 'PT OSI',
                'description' => $faker->text,
                'facebook_link' => 'https://facebook.com/OSIGroup',
                'x_link' => 'https://x.com/OSIGroup',
                'website_link' => 'https://OSIGroup.com',
            ],
        ];

        foreach ($organizers as $organizer) {
            Organizer::create($organizer);
        }
    }
}
