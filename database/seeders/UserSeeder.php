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

        //supplies status
        // 0 - pending 
        // 1 - approved
        // 2 - receieved
        // 3 - return
        
        $user = new User;
        $user->first_name   = 'Admin';    
        $user->last_name    = 'User';
        $user->password     = bcrypt('admin123');
        $user->email        = 'admin@gmail.com';
        $user->status_id    = 1;
        $user->department_id = 0;
        $user->save();

        $user->assignRole('admin');

        $user2 = new User;
        $user2->first_name   = 'Warehouse';    
        $user2->last_name    = 'User';
        $user2->password     = bcrypt('123123');
        $user2->email        = 'warehouse@gmail.com';
        $user2->status_id    = 1;
        $user2->department_id = 0;
        $user2->save();

        $user2->assignRole('warehouse');
    }
}
