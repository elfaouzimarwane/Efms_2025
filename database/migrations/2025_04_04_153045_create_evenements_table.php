<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    // Crée la table "evenements"
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('theme');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('description');
            $table->integer('cout_journalier');
            $table->foreignId('expert_id')->constrained('experts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    // Supprime la table "evenements"
    public function down()
    {
        Schema::dropIfExists('evenements');
    }
};
