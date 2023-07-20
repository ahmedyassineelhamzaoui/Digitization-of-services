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
        Schema::create('paiments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('client_nom');
            $table->string('client_prenom');
            $table->string('telephone')->nullable();
            $table->string('credential_id');
            $table->string('identifiant');
            $table->string('nature_recette');
            $table->decimal('montant_total', 10, 2);
            $table->timestamp('date')->nullable();
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
        Schema::dropIfExists('paiments');
    }
};
