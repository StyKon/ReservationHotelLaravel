<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Administrateur;
class CreateAdministrateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->increments('Id_Administrateur');
            $table->String('Nom');
            $table->String('Prenom');
            $table->String('Login');
            $table->String('Password');
            $table->timestamps();
        });
        $admin = new Administrateur();
        $admin->Nom = "Admin";
        $admin->Prenom = "Admin";
        $admin->Login = "Admin";
        $admin->Password = "Khalil17";
        $admin->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrateurs');
    }
}
