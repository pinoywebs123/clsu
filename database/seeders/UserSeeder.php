<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = new User;
        $user->first_name   = 'Admin';    
        $user->last_name    = 'User';
        $user->password     = bcrypt('admin123');
        $user->email        = 'admin@gmail.com';
        $user->status_id    = 1;
        $user->department_id = 0;
        $user->save();

        $user->assignRole('admin');
    }
}
