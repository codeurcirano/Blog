<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expediteur_id')->unsigned();
            $table->integer('destinataire_id')->unsigned();
            $table->text('message');
            $table->dateTime('date');

            $table->foreign('expediteur_id')->references('id')->on('users');
            $table->foreign('destinataire_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
