<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
    
        
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view_states']);
        Permission::create(['name' => 'view_centers']);
        // Add more permissions as needed

        // Create roles and assign existing permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->syncpermission('view_states');
        $adminRole->syncpermission('view_centers');
        // Add more permissions to admin as needed

        $stateRole = Role::create(['name' => 'state']);
        $stateRole->givePermissionTo('view_states');

        $centerRole = Role::create(['name' => 'center']);
        $centerRole->givePermissionTo('view_centers');
        
    }
}


