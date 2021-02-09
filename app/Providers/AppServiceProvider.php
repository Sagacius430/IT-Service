<?php

namespace App\Providers;

use Dotenv\Validator;
use Illuminate\Support\ServiceProvider;
// use Respect\Validation\Rules as RespectRules;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Adicionado ($ composer require respect/validation) para remover ()
        //crio a validação aqui
        //adiciono o providers em config/app.php (App\Providers\ValidatorServiceProvider::class)
        //adicionar menssagem em resource/lang/en/validation.php ('cpf' => 'Formato do CPF inválido')
        // Validator::extend('cpf', function($attribute, $value, $parameters, $validator){
        //     return (new RespectRules\Cpf())->validate($value);
        // });
    
        // Validator::extend('zipcode', function($attribute, $value, $parameters, $validator){
        //     return (new RespectRules\PostalCode('BR'))->validate($value);
        // });

        
    }
}
