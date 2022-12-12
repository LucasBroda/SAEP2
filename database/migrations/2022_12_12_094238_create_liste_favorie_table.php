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
        Schema::create('listeFavorie', function (Blueprint $table) {
            $table->unsignedBigInteger('id_oeuvre');
            $table->unsignedBigInteger('id_visiteur');
            $table->foreign('id_oeuvre')->references('id')->on('oeuvre')
                ->onDelete('cascade');
            $table->foreign('id_visiteur')->references('id')->on('visiteur')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listeFavorie');
    }
};
