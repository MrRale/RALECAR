<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ValidadorEc;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    use ValidadorEc;
    public function register(Request $request)
    {
        // dd($request);
        // $this->validator($request->all())->validate();
        $campos = [
            'name' => 'required|min:3|string|max:40',
                'name' => 'required|min:3|string|max:40',
                'cedula' => 'required|min:10|max:10|unique:users,cedula,' . $request->cedula,
                'telefono' => 'required|min:10|max:10|String',
                'email' => 'required|string|email|max:255|unique:users,email,' . $request->email,
                'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $mensaje = [
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
        ];
        $this->validate($request, $campos, $mensaje);
       

        $digitos10Ruc = substr($request->ruc, 0, 10);
        if($request->ruc==""){// si el campo ruc esta vacio entonces
            if (!$this->validarCedula($request->cedula)){
                return back()->with('aviso','Cedula no válida');
            } 
        }else{
            if($digitos10Ruc != $request->cedula){
                return back()->with('aviso','Los digitos principales entre la Cedula y el RUC no son los mismos');
            }
            if (!$this->validarCedula($request->cedula) && !$this->validarRucPersonaNatural($request->ruc)){
                return back()->with('aviso','Cedula y RUC no válidos');
            } 
            if (!$this->validarCedula($request->cedula)){
                    return back()->with('aviso','Cedula y RUC no válida');
            } 
            if (!$this->validarRucPersonaNatural($request->ruc)) {
                return back()->with('aviso','RUC no válido');
            }
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
