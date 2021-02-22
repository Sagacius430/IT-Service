<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OsRequest extends FormRequest
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
        'service'    =>'required',        
        'status'     =>'required',
        'machines_id'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'service'     =>'serviço',
            'status'      =>'status',
            'machines_id' => 'computador',
        ];
    }

    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.'
        ];
    }
}
