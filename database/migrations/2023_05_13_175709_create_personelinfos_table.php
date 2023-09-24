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
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('type_piece')->nullable();
            $table->string('numero_piece')->nullable();
            $table->string('region');
            $table->string('localite');
            $table->string('corps_anterieur')->nullable();
            $table->string('Corps');
            $table->string('minstere_anterieur')->nullable();
            $table->string('minstere');
            $table->string('fonction');
            $table->string('fonction_anterieur')->nullable();
            $table->string('service');
            $table->string('arret');
            $table->date('date_nomination')->nullable();
            $table->date('date_effet');
            $table->date('date_fin');
            $table->date('date_decret')->nullable();
            $table->date('date_retrait')->nullable();
            $table->string('situation_matrimoniale')->nullable();
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
