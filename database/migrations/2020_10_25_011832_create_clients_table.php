<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('Id_Client');
            $table->integer('Civilite')->length(8)->unique();
            $table->String('Password');
            $table->String('Nom');
            $table->String('Prenom');
            $table->String('Email');
            $table->String('Mobile');
            $table->String('Adresse');
            $table->String('CodePostal');
            $table->String('Ville');


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
