<?php

namespace Database\Seeders;

use App\Models\Department as D;
use Illuminate\Database\Seeder;

class Department extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = ['CSE', 'EEE', 'BBA', 'MBA', 'LAW'];

        for ($i = 0; $i < count($depts); $i++) {
            D::create([
                'name' => $depts[$i]
            ]);
        }
    }
}
