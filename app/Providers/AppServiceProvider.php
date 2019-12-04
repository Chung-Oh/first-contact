<?php

namespace App\Providers;

use Code\Validator\Cnpj;
use Code\Validator\Cpf;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Mudando a linguagem de Faker para popular DB
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('pt_BR');
        });
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Usando biblioteca da Code Education abaixo
        \Validator::extend('document_number', function ($attribute, $value, $parameters, $validator) {
            $documentValidator = $parameters[0] == 'cpf' ? new Cpf() : new Cnpj();
            // dd($documentValidator->isValid($value));
            return $documentValidator->isValid($value);
        });

        /**
         * Situação: quando alterar alguma tabela já em produção.
         * Contornando erro de dados primitivos do DB para Doctrine/Laravel funcionar de forma correto
         * Caso continuar com erros, fazer de forma manual no arquivo Migration
         */
        // $plataform = \Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
        // $plataform->registerDoctrineTypeMapping('enum', 'string');
        // $plataform->registerDoctrineTypeMapping('char', 'string');
    }
}
