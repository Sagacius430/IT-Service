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
            
            'machine.machine_type' =>'required',
            'machine.brand'        =>'required',
            'machine.model'        =>'required',
            'machine.serial_number'=>'required',
            'machine.description'  =>'required',
            'machine.breakdowns'   =>'required',

        ];
    }    

    public function attributes()
    {
        return [

            'machine.machine_type'  =>'tipo de computador',
            'machine.name'          =>'nome',
            'machine.brand'         =>'marca',
            'machine.model'         =>'modelo',
            'machine.serial_number' =>'número de série',
            'machine.description'   =>'descrição',
            'machine.breakdowns'    =>'avarias',

        ];
    }

    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.',
        ];
    }
}
