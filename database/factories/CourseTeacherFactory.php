<?php

namespace Database\Factories;

use App\Models\CourseTeacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseTeacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => rand(1, 10),
            'teacher_id' => rand(1, 10),
            'session_id' => rand(1, 3),
            'semester_id' => rand(1, 3),
            'department_id' => rand(1, 5),
        ];
    }
}
