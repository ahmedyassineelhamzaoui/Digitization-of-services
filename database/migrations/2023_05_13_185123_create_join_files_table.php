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
        Schema::create('join_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('decisionnomination_path')->nullable();
            $table->string('decisionaffectation_path')->nullable();
            $table->string('certificatpriseservice_path')->nullable();
            $table->string('Bulletinsoldeavant_path')->nullable();
            $table->string('Bulletinsoldeapres_path')->nullable();
            $table->string('certifcatnomhebergement_path')->nullable();
            $table->string('attestationhonneurlegalise_path')->nullable();
            $table->string('certificatresidence_path')->nullable();
            $table->string('pieceidentite_path')->nullable();
            $table->string('actemariage_path')->nullable();
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
