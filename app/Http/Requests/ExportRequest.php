<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportRequest extends FormRequest
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
            'date_start'=>'required',
            'date_end'  =>'required'
        ];        
    }

    public function attributes()
    {
        return [
            'date_start'=>'Data inicial',
            'date_end'  =>'Data final'
        ];
    }
    
    public function messages(){
        return[
            'required'=>'O campo :attribute é obrigatório.'
        ];
    }
}
