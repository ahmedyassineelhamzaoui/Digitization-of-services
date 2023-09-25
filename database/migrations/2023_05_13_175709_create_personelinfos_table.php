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
            $table->string('matricule')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('type_piece')->nullable();
            $table->string('numero_piece')->nullable();
            $table->string('region')->nullable();
            $table->string('localite')->nullable();
            $table->string('corps_anterieur')->nullable();
            $table->string('Corps')->nullable();
            $table->string('minstere_anterieur')->nullable();
            $table->string('minstere');
            $table->string('fonction')->nullable();
            $table->string('fonction_anterieur')->nullable();
            $table->string('service')->nullable();
            $table->string('arret')->nullable();


            $table->string('secteur')->nullable();
            $table->string('raisonsociale')->nullable();
            $table->string('Sigle')->nullable();
            $table->string('type_batiment')->nullable();
            $table->string('Quartier')->nullable();
            $table->string('Standing')->nullable();
            $table->string('ILot')->nullable();
            $table->string('Lot')->nullable();
            $table->string('Usage')->nullable();
            $table->string('Ville')->nullable();
            $table->string('date_occupation')->nullable();
            $table->string('Fonctionaire')->nullable();
            $table->string('person')->nullable();


            $table->date('date_nomination')->nullable();
            $table->date('date_effet')->nullable();
            $table->date('date_fin')->nullable();
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
