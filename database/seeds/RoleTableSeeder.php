<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('roles')->insert([
            'role_name' => 'superadmin'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'admin'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'inventory manager'
        ]);
        DB::table('roles')->insert([
            'role_name' => 'order manager '
        DB::table('roles')->insert([
            'role_name' => 'customer'
        ]);*/
        $role_superadmin = new Role();
        $role_superadmin -> role_name = 'superadmin';
        $role_superadmin -> save();

        $role_admin = new Role();
        $role_admin -> role_name = 'admin';
        $role_admin -> save();

        $role_inv_manager = new Role();
        $role_inv_manager -> role_name = 'inventory manager';
        $role_inv_manager -> save();

        $role_ord_manager = new Role();
        $role_ord_manager -> role_name = 'order manager';
        $role_ord_manager -> save();

        $role_customer = new Role();
        $role_customer -> role_name = 'customer';
        $role_customer -> save();

    }
}
