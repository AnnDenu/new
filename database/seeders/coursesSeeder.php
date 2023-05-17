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
                'image' => 'https://sergiev-posad.ru/www/news/2021/6/1021183905588648.jpg'
            ],
            [
                'name' => 'Java программирование',
                'description' => 'Бесплатный онлайн курс',
                'image' => 'https://phonoteka.org/uploads/posts/2022-09/1663695158_1-phonoteka-org-p-programmist-fon-vkontakte-2.jpg'
            ],
        ];
        courses::insert($courses);
    }
}
