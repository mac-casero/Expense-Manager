<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Dashboard',
                'slug' => 'Dashboard',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'User Management',
                'slug' => 'User Management',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Expense Category',
                'slug' => 'Expense Category',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Expense',
                'slug' => 'Expense',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ];

        DB::table('permissions')->insert($permissions);
    }
}
