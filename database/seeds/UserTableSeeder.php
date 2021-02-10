<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_superadmin = Role::where('role_name','superadmin')->first();
      $role_admin = Role::where('role_name','admin')->first();
      $role_inv_manager = Role::where('role_name','inventory manager')->first();
      $role_ord_manager = Role::where('role_name','order manager')->first();
      $role_customer = Role::where('role_name','customer')->first();

      $admin = new User();
      $admin -> name = 'Admin';
      $admin -> last_name = 'admin';
      $admin -> email = 'admin@gmail.com';
      $admin -> password = bcrypt('admin123');
      $admin ->save();
      $admin ->roles() -> attach($role_admin);
      




    }
}
