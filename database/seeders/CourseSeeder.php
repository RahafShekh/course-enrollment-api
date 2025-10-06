<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['title' => 'JavaScript Basics', 'description' => 'Learn JavaScript from scratch'],
            ['title' => 'Node.js Advanced', 'description' => 'Deep dive into Node.js'],
            ['title' => 'Database Design', 'description' => 'Learn to design databases'],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
