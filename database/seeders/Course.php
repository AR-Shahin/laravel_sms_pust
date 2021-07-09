<?php

namespace Database\Seeders;

use App\Models\Course as ModelsCourse;
use Illuminate\Database\Seeder;

class Course extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = ['CSE101', 'CSE102', 'CSE103', 'CSE104', 'BBA1', 'BBA2', 'BBA3', 'LAW1', 'EEE3', 'MBA1', 'LAW5'];

        for ($i = 0; $i < count($courses); $i++) {
            ModelsCourse::create([
                'name' => $courses[$i]
            ]);
        }
    }
}
