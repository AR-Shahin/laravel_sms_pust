<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Database\Seeders\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::factory(1)->create();
        \App\Models\Teacher::factory(10)->create();
        \App\Models\Student::factory(10)->create();
        \App\Models\CourseTeacher::factory(20)->create();
        $this->call([
            Department::class,
            Course::class,
            SemesterSeeder::class,
            SessionSeeder::class,
            DepartmentAdminSeeder::class
        ]);
    }
}
