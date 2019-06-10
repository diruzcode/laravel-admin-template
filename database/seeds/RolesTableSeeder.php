<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
              'display_name' => 'Super Administrador',
              'hidden' => true,
              'permissions' => [1,2,3,4,5,6,7,8,9,10,11,12,13]
            ],
            [
              'display_name' => 'Administrador',
              'hidden' => false,
              'permissions' => [1,2,3,4,5,6,7,8,9,10,11,12,13]
             ]
        ];

        foreach ($roles as $item){
            $role = Role::create([
                'display_name'  => $item['display_name'],
                'name'          => str_slug($item['display_name']),
                'hidden'        => $item['hidden']
            ]);

            $permissions = Permission::whereIn('id',$item['permissions'])->get();
            $role->syncPermissions($permissions);
        }
    }
}
