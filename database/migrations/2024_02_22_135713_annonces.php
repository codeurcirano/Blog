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

        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('biens_id')->unsigned();
            $table->dateTime('date_de_publication');
            $table->dateTime('date_de_fin');
            $table->string('etat');
            $table->timestamps();

            $table->foreign('biens_id')->references('id')->on('biens');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('annonces');
        }

    }
};