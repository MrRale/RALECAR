<?php

namespace App\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;

class ValidarRUCPersonaNatural implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

  
    
    protected function validarCodigoEstablecimiento($numero)
    {
        // dd("holassdfd");
        if ($numero < 1) {
            throw new Exception('Código de establecimiento no puede ser 0');
        }

        return true;
    }


    protected function validarInicial($numero, $caracteres)
    {
      
        if (empty($numero)) {
            throw new Exception('Valor no puede estar vacio');
        }

        if (!ctype_digit($numero)) {
            throw new Exception('Valor ingresado solo puede tener dígitos');
        }

        if (strlen($numero) != $caracteres) {
            throw new Exception('Valor ingresado debe tener '.$caracteres.' caracteres');
        }
        // dd("hola");// si pasa
        return true;
    }


    protected function validarCodigoProvincia($numero)
    {
        
        if ($numero < 0 || $numero > 24) {
            throw new Exception('Codigo de Provincia (dos primeros dígitos) no deben ser mayor a 24 ni menores a 0');
        }
        // dd("hola");//si pasa

        return true;
    }

    protected function validarTercerDigito($numero, $tipo)
    {
       
        switch ($tipo) {
            case 'cedula':
            case 'ruc_natural':
                
                if ($numero < 0 || $numero > 5) {
                  
                    throw new Exception('Tercer dígito debe ser mayor o igual a 0 y menor a 6 para cédulas y RUC de persona natural');
                }
                break;
            case 'ruc_privada':
                if ($numero != 9) {
                    throw new Exception('Tercer dígito debe ser igual a 9 para sociedades privadas');
                }
                break;

            case 'ruc_publica':
                if ($numero != 6) {
                    throw new Exception('Tercer dígito debe ser igual a 6 para sociedades públicas');
                }
                break;
            default:
                throw new Exception('Tipo de Identificacion no existe.');
                break;
        }

        // dd("holas"); si pasa

        return true;
    }

   

    protected function algoritmoModulo10($digitosIniciales, $digitoVerificador)
    {
        $arrayCoeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];

        $digitoVerificador = (int) $digitoVerificador;
        $digitosIniciales = str_split($digitosIniciales);

        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ((int) $value * $arrayCoeficientes[$key]);

            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int) $valorPosicion;
            }

            $total = $total + $valorPosicion;
        }

        $residuo = $total % 10;

        $resultado = ($residuo == 0) ? 0 : 10 - $residuo;

        if ($resultado != $digitoVerificador) {
            throw new Exception('Dígitos iniciales no validan contra Dígito Idenficador');
        }

        return true;
    }

    
    
    public function validarRucPersonaNatural($numero = '')
    {
        // dd($numero);
        // fuerzo parametro de entrada a string
        $numero = (string) $numero;
        // dd($numero); si llega completo

        // borro por si acaso errores de llamadas anteriores.
        // $this->setError('');

        // validaciones
        try {
            
            $this->validarInicial($numero,'13');
            $this->validarCodigoProvincia(substr($numero, 0, 2));
            $this->validarTercerDigito($numero[2], 'ruc_natural');
            $this->validarCodigoEstablecimiento(substr($numero, 10, 3));
            $this->algoritmoModulo10(substr($numero, 0, 9), $numero[9]);
        } catch (Exception $e) {
            // $this->setError($e->getMessage());
            return false;
        }
        return true;
    }


    public function passes($attribute, $value)
    {
        $respuesta = $this->validarRucPersonaNatural($value);
        return $respuesta;
    }


    public function message()
    {
        return 'El RUC no es válido.';
    }
}
