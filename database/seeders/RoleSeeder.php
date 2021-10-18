<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'client']);
        $role3 = Role::create(['name' => 'creator']);

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'users.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'users.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'products.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'productsmanage.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'productsmanage.create'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'productsmanage.show'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'productsmanage.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'productsmanage.destroy'])->syncRoles([$role1]);
    }
}
