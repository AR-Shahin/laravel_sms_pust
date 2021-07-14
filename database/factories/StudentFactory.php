<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->name,
            'department_id' => rand(1, 5),
            'registration' => rand(1000, 90000),
            'email' => $this->faker->safeEmail,
            'password' => 'password',
            'phone' => 458966666666,
        ];
    }
}
