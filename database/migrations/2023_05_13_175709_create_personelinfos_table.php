<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personelinfos', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('email');
            $table->string('telephone');
            $table->string('adresse');
            $table->string('type_piece');
            $table->string('numero_piece');
            $table->string('region');
            $table->string('localite');
            $table->string('corps_anterieur');
            $table->string('Corps');
            $table->string('minstere_anterieur');
            $table->string('minstere');
            $table->string('fonction');
            $table->string('fonction_anterieur');
            $table->string('service');
            $table->string('arret');
            $table->date('date_nomination');
            $table->date('date_effet');
            $table->date('date_fin');
            $table->string('situation_matrimoniale');
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
        Schema::dropIfExists('personelinfos');
    }
};
