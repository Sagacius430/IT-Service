<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            
            'machine_type' =>'required',
            'brand'        =>'required',
            'model'        =>'required',
            'serial_number'=>'required',
            'description'  =>'required',
            'breakdowns'   =>'required',

        ];
    }    

    public function attributes()
    {
        return [

            'machine_type'  =>'tipo de computador',
            'name'          =>'Nome',
            'brand'         =>'marca',
            'model'         =>'modelo',
            'serial_number' =>'número de série',
            'description'   =>'descrição',
            'breakdowns'    =>'avarias',

        ];
    }

    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.',
        ];
    }
}
