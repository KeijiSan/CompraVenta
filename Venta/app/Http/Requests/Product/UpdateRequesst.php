<?php

namespace App\Http\Requests\Product;

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
            'name'=>'string|required|unique:products,name'.$this->route('product')->id.'|max:255',

            'ruc_number'=>'required|string|min:9|unique:providers,ruc_number,'.
            $this->route('provider')->id.'|max:9',



            'image'=>'required|dimensions:min_width=100,min_height=200',
            'sell_price'=>'required|',
            'category_id'=>'integer|required|exists:App\Category,id',
            'provider_id'=>'integer|required|exists:App\Provider,id',     

            'name'=>'required|string|max:50',
            'descripcion'=>'nullable|string|max:255',

        ];
    }
 public function message()
    {
        return[
            'name.string'=>'El valor no es correcto.',
            'name.required'=>'el campo es requerido.',
            'name.unique'=>'el producto ya esta registrado.',
            'name.max'=>'solo se permite 255 caracteres.',

            'image.required'=>'el campo es requerido.',
            'image.dimensions'=>'solo se permite imagenes de 100x200px.',

            'sell_price.required'=>'el campo es requerido.',

            'category_id.integer'=>'el valor tiene que ser entero.',
            'category_id.required'=>'el campo es requerido.',
            'category_id.exists'=>'la categoria no existe.',

            'provider_id.integer'=>'el valor tiene que ser entero.',
            'provider_id.required'=>'el campo es requerido',
            'provider_id.exists'=>'la categoria no existe.',

        ];
    }
}
