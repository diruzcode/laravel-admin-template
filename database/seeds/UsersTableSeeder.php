<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
          [
            'rut' => '1-9',
            'first_name' => 'Hola',
            'last_name' => 'Mundo',
            'father_surname' => 'Real',
            'mother_surname' => 'Desarrolladores',
            'email' => 'hola@mundo.com',
            'access_web' =>  true,
            'access_app' =>  true,
            'password' => 'holamundo',
            'hidden' => true,
            'role' => 'super-administrador'
          ]

      ];

      foreach ($users as $item){

          $user = User::create([
              'rut' => $item['rut'],
              'first_name' => $item['first_name'],
              'last_name' => $item['last_name'],
              'father_surname' => $item['father_surname'],
              'mother_surname' => $item['mother_surname'],
              'email' => $item['email'],
              'access_web' =>  $item['access_web'],
              'access_app' =>  $item['access_app'],
              'password' => $item['password'],
              'hidden' => $item['hidden']
          ]);

          $user->assignRole($item['role']);

      }

    }
}
