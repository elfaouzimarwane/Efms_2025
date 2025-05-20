<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    // Crée la table "ateliers"
    public function up()
    {
        Schema::create('ateliers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('evenement_id')->constrained('evenements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    // Supprime la table "ateliers"
    public function down()
    {
        Schema::dropIfExists('ateliers');
    }
};

