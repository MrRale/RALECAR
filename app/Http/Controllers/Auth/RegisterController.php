<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\ValidarCedula;
use App\Rules\ValidarRUCPersonaNatural;
use App\Rules\ValidarCedulaRepetida;
use App\Rules\ValidarEmailRepetido;

class RegisterController extends Controller
{


    use RegistersUsers;


    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        // dd($data);
        print_r('VALIDANDO');
        return Validator::make(
            $data,
            [
                'name' => 'required|min:3|string|max:40',
                'name' => 'required|min:3|string|max:40',
                'cedula' => 'required|min:10|max:10|unique:users,cedula,' . $data['cedula'],
                'telefono' => 'required|min:10|max:10|String',
                'cedula' => [new ValidarCedula],
                'cedula' => [new ValidarCedulaRepetida],
                'email' => [new ValidarEmailRepetido],
                'ruc' => [new validarRucPersonaNatural],
                'email' => 'required|string|email|max:255|unique:users,email,' . $data['email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => ':attribute es requerido',
                'cedula.unique' => 'La cédula ya existe',
                'email.unique' => 'El correo electrónico ya está registrado',
                'name.min' => 'El nombre debe tener una longitud mínima de 3 caracteres',
                'name.max' => 'El nombre debe tener una longitud máxima de 40 caracteres',
                'cedula.min' => 'La cédula debe tener una longitud de 10 dígitos',
                'cedula.max' => 'La cédula debe tener una longitud de 10 dígitos',
                'telefono.min' => 'El teléfono no debe tener menos de 10 dígitos',
                'telefono.max' => 'El teléfono no debe tener mas de 10 dígitos',
                'password.min' => 'La longitud de la contraseña debe ser de al menos 8 caracteres',
                'password.confirmed' => 'La contraseña no coincide con la confirmación de la misma'
            ]
        );
    }


    protected function create(array $data)
    {
        // dd($data);
      
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cedula' => $data['cedula'],
            'ruc' => $data['ruc'],
            'telefono' => $data['telefono'],
            // 'direccion'=>$data['direccion'],
            // 'empresa'=>$data['empresa'],
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('Cliente');
        $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        $shopping_cart->update([
            "user_id" => $user->id
        ]);
        return $user;
    }
}
