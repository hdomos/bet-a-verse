<?php

use App\Models\Sport;
use App\Models\Team;
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
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Sport::class)->constrained();

            $table->string('name');

            $table->boolean('is_active');
            $table->boolean('is_finished');
            $table->foreignIdFor(Team::class, 'winner_team_id')->nullable()->constrained('teams', 'id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
