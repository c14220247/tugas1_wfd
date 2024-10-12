<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Organizer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $events = [
            [
                'title' => 'Indonesia Innovation Challenge 2024 Powered by Launch Pad',
                'venue' => 'Jatim Expo',
                'date' => '2024-10-23',
                'start_time' => '09:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Surabaya Science & Tech Events', 'Innovation Challenge']),
                'organizer_id' => Organizer::where('name', 'Southern Sydney University')->first()->id,
                'event_category_id' => Category::where('name', 'Competition')->first()->id,
            ],
            [
                'title' => 'Kids Education Expo 2024',
                'venue' => 'The Westin',
                'date' => '2024-10-21',
                'start_time' => '09:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Kids Expo', 'Education Expo']),
                'organizer_id' => Organizer::where('name', 'MSW Global')->first()->id,
                'event_category_id' => Category::where('name', 'Expo')->first()->id,
            ],
            [
                'title' => 'Surabaya Great Expo 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-10-16',
                'start_time' => '08:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Surabaya Expo']),
                'organizer_id' => Organizer::where('name', 'Debindo')->first()->id,
                'event_category_id' => Category::where('name', 'Expo')->first()->id,
            ],
            [
                'title' => 'SMEX (Surabaya Music, Multimedia, and Lighting Expo) 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-09-29',
                'start_time' => '08:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Music', 'Multimedia Expo']),
                'organizer_id' => Organizer::where('name', 'HW Group')->first()->id,
                'event_category_id' => Category::where('name', 'Expo')->first()->id,
            ],
            [
                'title' => 'Japan Edu Expo 2024',
                'venue' => 'Hotel Said',
                'date' => '2024-09-22',
                'start_time' => '08:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Education Expo', 'International']),
                'organizer_id' => Organizer::where('name', 'OBK Group')->first()->id,
                'event_category_id' => Category::where('name', 'Expo')->first()->id,
            ],
            [
                'title' => 'Surabaya Hospital Expo 2024',
                'venue' => 'Grand City Surabaya',
                'date' => '2024-10-11',
                'start_time' => '08:00:00',
                'description' => $faker->text,
                'booking_url' => 'https://tiket.com',
                'tags' => json_encode(['Hospital Expo', 'Surabaya Expo']),
                'organizer_id' => Organizer::where('name', 'PT OSI')->first()->id,
                'event_category_id' => Category::where('name', 'Expo')->first()->id,
            ]
        ];

        foreach ($events as $event) {
            \App\Models\Event::create($event);
        }
    }
}
