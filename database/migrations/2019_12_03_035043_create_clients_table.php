<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/**
 * Comando Artisan = php artisan make:migration create_clients_table --create=clients
 * Usado = php artisan make:model Client -m
 * 
 * Executar Migration com Seed = php artisan migrate --seed
 */
class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('document_number')->unique(); // cpf ou cnpj
            $table->string('email');
            $table->string('phone');
            $table->boolean('defaulter'); // inadimplente
            $table->date('date_birth')->nullable();
            $table->char('sex', 10)->nullable();
            $table->enum('marital_status', array_keys(App\Client::MARITAL_STATUS))->nullable(); // estado civil
            $table->string('physical_desability')->nullable(); // deficiência física
            $table->string('company_name')->nullable();
            $table->string('client_type')->default('individual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
