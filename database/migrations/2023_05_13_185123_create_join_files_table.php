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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');            
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('decisionnomination_path');
            $table->string('decisionaffectation_path');
            $table->string('certificatpriseservice_path');
            $table->string('Bulletinsoldeavant_path');
            $table->string('Bulletinsoldeapres_path');
            $table->string('certifcatnomhebergement_path');
            $table->string('attestationhonneurlegalise_path');
            $table->string('certificatresidence_path');
            $table->string('pieceidentite_path');
            $table->string('actemariage_path');
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
        Schema::dropIfExists('join_files');
    }
};
