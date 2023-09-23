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
        Schema::create('conjoints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('nom_prenom');
            $table->string('fonction');
            $table->string('matricule_Conjoint');
            $table->string('service_empolyeur');
            $table->date('date_embauche');
            $table->string('adress_conjoint');
            $table->string('regime');
            $table->string('taux_indemnite');
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
        Schema::dropIfExists('conjoint');
    }
};
