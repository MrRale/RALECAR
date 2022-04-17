<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //CREACION DE LOS ROLES DEL SISTEMA
     Role::create(['name' => 'Administrador']);
     Role::create(['name' => 'Vendedor']);
     Role::create(['name' => 'Cliente']);
     

     //CREACION DE LOS USUARIOS, SUS RESPECTIVOS PERFILES Y LA ASIGNACION DE LOS ROLES A C/U
     //-------USER DE ROL O TIPO ADMINISTRADOR-----------//
     $admin = User::create([
         'cedula'=>'2100463188',
         'ruc'=>'2100463188001',
         'telefono'=>'0988703049',
        //  'direccion'=>'Av. Los Olivos y Juan Montalvo',
        //  'empresa'=>'RALE',
        'name'=>'Rafael Loaiza',
        'email'=>'rafael@gmail.com',
        'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'//morales98
    ]);

    $admin->assignRole('Administrador');//asignamos el rol de administrador al usuario creado

     //-------USER DE ROL O TIPO ADMINISTRADOR-----------//
     $admin = User::create([
        'cedula'=>'2100463187',
         'ruc'=>'2100463187001',
         'telefono'=>'0988703045',
        //  'direccion'=>'Av. San Pablo y 9 de octubre',
        //  'empresa'=>'ESPOCH',
        'name'=>'Andres',
        'email'=>'gamr98@outlook.es',
        'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'//morales98
     ]);
    $admin->assignRole('Administrador');//asignamos el rol de administrador al usuario creado


 //-------USER DE ROL TIPO VENDEDOR-----------//
 $cliente = User::create([
    'cedula'=>'0101415054',
    'ruc'=>'0101415054001',
    'telefono'=>'0988703046',
    // 'direccion'=>'Av. Jorge Chiriboga',
    // 'empresa'=>'EPACEM',
   'name'=>'Pablo',
   'email'=>'pablo@gmail.com',
    'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'//morales98
]);
$cliente->assignRole('Vendedor');//asignamos el rol de administrador al usuario creado



    //-------USER DE ROL O TIPO CLIENTE-----------//
    $cliente = User::create([
        'cedula'=>'2100463183',
        'ruc'=>'2100463183001',
        'telefono'=>'0988703044',
        // 'direccion'=>'Av. Jorge Chiriboga',
        // 'empresa'=>'EPACEM',
       'name'=>'Sara Socas',
       'email'=>'sara@gmail.com',
        'password'=>'$2y$10$UWrWMU9GPWytScvIDu5fMOJTfiCvqA/ZpjxTiu7Js0310ySTjuYPy'//morales98
    ]);
    $cliente->assignRole('Cliente');//asignamos el rol de administrador al usuario creado
   

}
}
