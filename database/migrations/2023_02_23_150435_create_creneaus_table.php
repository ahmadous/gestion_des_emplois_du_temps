<?php

use App\Models\User;
use App\Models\salle;
use App\Models\classe;
use App\Models\matiere;
use App\Models\type_intervention;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('creneaus', function (Blueprint $table) {
            $table->id();
            $table->integer('heure_debut');
            $table->integer('heure_fin');
            $table->string('jour');
            $table->foreignIdFor(salle::class)->constrained();
            $table->foreignIdFor(matiere::class)->constrained();
            $table->foreignIdFor(classe::class)->constrained();
            $table->foreignIdFor(type_intervention::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creneaus');
    }
};