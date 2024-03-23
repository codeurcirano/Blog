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
        Schema::create('biens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('titre');
            $table->text('description');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('pays');
            $table->float('prix');
            $table->integer('surface');
            $table->integer('chambres');
            $table->integer('salles_de_bain');
            $table->string('photos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('biens');
        }
    }
};