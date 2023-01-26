<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequesst extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'string|required|max:255',
            'dni'=>'string|required|unique:clients,dni'.$this->route('client ')->id.'|max:9',
            'ruc'=>'string|required|unique:clients,ruc'.$this->route('client ')->id.'|max:9',
            'address'=>'string|required|max:255',
            'phone'=>'string|required|unique:clients,phone'.$this->route('client')->id.'|max:9',
            'email'=>'string|required|unique:clients,email'.$this->route('client')->id.'|max:255,|email:rfc,dns',
        ];
    }
    public function message()
    {
        return[
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'el campo es requerido.',
            'name.max'=>'solo se permite 255 caracteres.',

            'dni.string'=>'el valor no es correcto.',
            'dni.required'=>'el campo es requerido.',
            'dni.unique'=>'este dni ya se encuentra registrado.',
            'dni.min'=>'se requiere 9 caracteres.',
            'dni.max'=>'solo se permite 9 caracteres.',


            'ruc.string'=>'el valor no es correcto.',
            'ruc.unique'=>'el rut ya se encuentra registrado.',
            'ruc.min'=>'se requiere 9 caracteres.',
            'ruc.max'=>'solo se permite 9 caracteres.',


            'address.string'=>'el valor no es correcto.',
            'address.max'=>'solo se permite 255 caracteres.',


            'phone.string'=>'el valor no es correcto.',
            'phone.unique'=>'el telefono se encuentra registrado',
            'phone.min'=>'se requiere 9 caracteres.',
            'phone.max'=>'solo se permite 9 caracteres.',

            
            'email.string'=>'el valor no es correcto.',
            'email.unique'=>'el correo se encuentra registrado',
            'email.max'=>'solo se permite 255 caracteres.',
            'email.email'=>'no es correo electronico.',

        ];
    }
}
