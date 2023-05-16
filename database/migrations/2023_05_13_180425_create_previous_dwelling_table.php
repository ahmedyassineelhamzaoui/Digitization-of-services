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
        Schema::create('previouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('ville_precedant')->nullable();
            $table->string('quartier_precedant')->nullable();
            $table->string('lot_precedant')->nullable();
            $table->date('date_liberation')->nullable();
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
        Schema::dropIfExists('previous_dwelling');
    }
};
