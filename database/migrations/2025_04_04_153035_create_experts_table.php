<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    // Crée la table "experts"
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('specialite'); // Remove default value
            $table->timestamps();
        });
    }

    // Supprime la table "experts"
    public function down()
    {
        Schema::dropIfExists('experts');
    }
};
