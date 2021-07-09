<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = ['Spring', 'Fall', 'Summer'];
        for ($i = 0; $i < count($semesters); $i++) {
            Semester::create([
                'name' => $semesters[$i]
            ]);
        }
    }
}
