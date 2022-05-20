<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions


        $arrayOfPermissionNames = [

          'view-reports','view-category','create-category','destroy-category','update-category',
          'view-products','create-product','update-product','destroy-product',
          'view-users','create-user','update-user','destroy-user',
          'view-access-control',
          'view-role','update-role','destroy-role','create-role',
          'view-permission','create-permission','update-permission','destroy-permission',
          'view-expired-products','view-outstock-products','backup-app','backup-db','view-settings',

        ];
       $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
           return ['name' => $permission, 'guard_name' => 'web'];
       });

      Permission::insert($permissions->toArray());

        // create roles and assign permissions
        $role = Role::create(['name' => 'sales-person'])
        ->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
