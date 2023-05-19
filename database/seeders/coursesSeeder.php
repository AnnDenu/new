<?php

namespace Database\Seeders;

use App\Models\courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class coursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Основы программирования',
                'description' => 'Основы программирования',
                'image' => 'https://webmg.ru/wp-content/uploads/2022/09/i-57-28.jpeg'
            ],
            [
                'name' => 'Java программирование',
                'description' => 'Бесплатный онлайн курс',
                'image' => 'https://webmg.ru/wp-content/uploads/2022/09/i-57-28.jpeg'
            ],
        ];
        courses::insert($courses);
    }
}
