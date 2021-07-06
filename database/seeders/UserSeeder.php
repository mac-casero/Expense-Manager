<?php
namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::where('slug','administrator')->first();
        $viewDashboard = Permission::where('slug','Dashboard')->first();
        $userManagement = Permission::where('slug','User Management')->first();
        $expenseCategory = Permission::where('slug','Expense Category')->first();
        $expense = Permission::where('slug','Expense')->first();

        $user = User::create([
            'email' => 'admin@expensemanager.com',
            'name' => 'Juan Dela Cruz',
            'password' => bcrypt('password'),
        ]);

        $user->roles()->attach($administrator);
        $user->permissions()->attach($viewDashboard);
        $user->permissions()->attach($userManagement);
        $user->permissions()->attach($expenseCategory);
        $user->permissions()->attach($expense);
    }
}
