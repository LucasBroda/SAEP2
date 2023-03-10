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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oeuvre_id')->constrained()->cascadeOnDelete();
            $table->foreignId('visiteur_id')->constrained()->cascadeOnDelete();
            $table->string('titre');
            $table->string('corp');
            $table->integer('note');
            $table->date('dateUpdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
};
