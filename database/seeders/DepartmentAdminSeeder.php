<?php

namespace Database\Seeders;

use App\Models\DepartmentAdmin;
use Illuminate\Database\Seeder;

class DepartmentAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'dept one',
                'email' => 'dept@mail.com',
                'slug' => 'dept-one',
                'password' => bcrypt('password'),
                'department_id' => 1,
                'admin_id' => 1,
                'phone' => 123456789
            ],
            [
                'name' => 'dept two',
                'email' => 'dept2@mail.com',
                'slug' => 'dept-two',
                'password' => bcrypt('password'),
                'department_id' => 2,
                'admin_id' => 1,
                'phone' => 123456789
            ],
            [
                'name' => 'dept three',
                'email' => 'dept3@mail.com',
                'slug' => 'dept-three',
                'password' => bcrypt('password'),
                'department_id' => 3,
                'admin_id' => 1,
                'phone' => 123456789
            ],
            [
                'name' => 'dept four',
                'email' => 'dept4@mail.com',
                'slug' => 'dept-onwwe',
                'password' => bcrypt('password'),
                'department_id' => 4,
                'admin_id' => 1,
                'phone' => 123456789
            ],
            [
                'name' => 'dept five',
                'email' => 'dept5@mail.com',
                'slug' => 'dept-five',
                'password' => bcrypt('password'),
                'department_id' => 5,
                'admin_id' => 1,
                'phone' => 123456789
            ]
        ];

        DepartmentAdmin::insert($admins);
    }
}
