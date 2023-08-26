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
        Schema::create('article_vente', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->integer('qteStock');
            $table->integer('valeurPromo');
            $table->text('image');
            $table->integer('prixVente');
            $table->integer('marge');
            $table->integer('coutFrabique');
            $table->string('reference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_vente');
    }
};
