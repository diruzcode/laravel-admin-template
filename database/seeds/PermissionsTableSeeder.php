<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
          ['display_name' => 'Ver Sección Control de Acceso'],                                //
          ['display_name' => 'Listar Usuarios'],                                              //
          ['display_name' => 'Crear Usuarios'],                                               //
          ['display_name' => 'Editar Usuarios'],                                              //
          ['display_name' => 'Eliminar Usuarios'],                                            //
          ['display_name' => 'Listar Roles'],                                                 //
          ['display_name' => 'Crear Roles'],                                                  //
          ['display_name' => 'Editar Roles'],                                                 //
          ['display_name' => 'Eliminar Roles'],                                               //
          ['display_name' => 'Listar Permisos'],                                              //
          ['display_name' => 'Crear Permisos'],                                               //
          ['display_name' => 'Editar Permisos'],                                              //
          ['display_name' => 'Eliminar Permisos'],                                            //
        ];


        foreach ($permisos as $item){
            Permission::create([
                'display_name'  => $item['display_name'],
                'name'          => str_slug($item['display_name'])
            ]);
        }
    }
}
