<?php

namespace App\Http\Requests\Provider;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:200|unique:providers',
            'ruc_number'=>'required|string|max:9|min:9|unique:providers',
            'address'=>'nullable|string|max:255', 
            'phone'=>'required|string|max:9|min:9|unique:providers',
        ];
    }
    public function message()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permite 50 caracteres',
            
            
            'email.required'=>'Este campo es requerido.',
            'email.email'=>'No es un correo electrénico',
            'email.string'=>'El valor no es correcto.',
            'email.max'=> 'Solo se permiten 255 caracteres.',
            'email.unique'=>'ya se encuentra registrado.',
 
            'ruc_number.required'=>'este campo es requerido',
            'ruc_number.string'=>'el valor no es correcto',
            'ruc_number.max'=>'solo se permite 9 caracteres',
            'ruc_number.min'=>'se requiere de 9 caracteres',
            'ruc_number.unique'=>'ya se encuentra registrado',

            'address.max'=>'solo se permite 255 caracteres',
            'address.string'=>'el valor no es correcto',
            

            'phone.required'=>'este campo es requerido',
            'phone.string'=>'el valor no es correcto',
            'phone.max'=>'solo se permite 9 caracteres',
            'phone.min'=>'se requiere de 9 caracteres',
            'phone.unique'=>'ya se encuentra registrado',
             
            
               
            
               
            


        
        ];
    }
}
