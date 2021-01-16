<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->increments('Id_Chambre');
            $table->String('Num');
            $table->String('NbPlace');
            $table->String('Prix');
            $table->String('Etat');
            $table->unsignedInteger('Id_Hotel');
            $table->foreign('Id_Hotel')->references('Id_Hotel')->on('hotels')->onDelete('cascade');



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
        Schema::dropIfExists('chambres');
    }
}
