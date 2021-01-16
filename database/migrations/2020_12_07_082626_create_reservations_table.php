<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('Id_Reservation');
            $table->String('DateDebut');
            $table->String('DateFin');
            $table->unsignedInteger('Id_Client');
            $table->foreign('Id_Client')->references('Id_Client')->on('clients')->onDelete('cascade');

            $table->unsignedInteger('Id_Hotel');
            $table->foreign('Id_Hotel')->references('Id_Hotel')->on('hotels')->onDelete('cascade');

            $table->unsignedInteger('Id_Chambre');
            $table->foreign('Id_Chambre')->references('Id_Chambre')->on('chambres')->onDelete('cascade');


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
        Schema::dropIfExists('reservations');
    }
}
