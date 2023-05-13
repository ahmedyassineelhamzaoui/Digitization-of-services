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
        Schema::create('previous_dwelling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personelinfos_id');
            $table->foreign('personelinfos_id')->references('id')->on('personelinfos');
            $table->string('ville_precedant');
            $table->string('quartier_precedant');
            $table->string('lot_precedant');
            $table->date('date_liberation');
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
