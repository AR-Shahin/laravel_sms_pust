<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [2018, 2019, 2020, 2021];
        for ($i = 0; $i < count($sessions); $i++) {
            Session::create([
                'name' => $sessions[$i]
            ]);
        }
    }
}
