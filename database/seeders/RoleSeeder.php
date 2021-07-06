<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::create([
            'name' => 'Administrator',
            'description' => 'super user',
            'slug' => 'Administrator',
        ]);

        $viewDashboard = Permission::where('slug','Dashboard')->first();
        $userManagement = Permission::where('slug','User Management')->first();
        $expenseCategory = Permission::where('slug','Expense Category')->first();
        $expense = Permission::where('slug','Expense')->first();

        $administrator->permissions()->attach($viewDashboard);
        $administrator->permissions()->attach($userManagement);
        $administrator->permissions()->attach($expenseCategory);
        $administrator->permissions()->attach($expense);

        $administrator = Role::create([
            'name' => 'User',
            'description' => 'can add expenses',
            'slug' => 'User',
        ]);
        $administrator->permissions()->attach($viewDashboard);
        $administrator->permissions()->attach($expense);

    }
}
