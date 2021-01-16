<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('Id_Hotel');
            $table->String('Nom');

            $table->unsignedInteger('Id_Ville');
            $table->foreign('Id_Ville')->references('Id_Ville')->on('villes')->onDelete('cascade');

          //  $table->unsignedInteger('Id_Chambre');
            //$table->foreign('Id_Chambre')->references('Id_Chambre')->on('chambres')->onDelete('cascade');

            $table->unsignedInteger('Id_Category');
            $table->foreign('Id_Category')->references('Id_Category')->on('categories')->onDelete('cascade');


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
        Schema::dropIfExists('hotels');
    }
}
