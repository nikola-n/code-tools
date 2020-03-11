<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, 20)->create()->each(function ($course) {
            $course->categories()->save(factory(Category::class)->make());
        });
    }
}
