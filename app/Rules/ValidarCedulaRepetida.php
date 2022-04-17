<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class ValidarCedulaRepetida implements Rule
{
  
    public function __construct()
    {
        //
    }

   
    public function passes($attribute, $value)
    {
        $respuesta = User::where('cedula',$value)->first();
        
        if($respuesta != null){// si no esta vacio, si existe
            return false;// error
        }else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La cédula ya existe';
    }
}
