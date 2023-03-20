<?php

use App\Models\Game;
use App\Models\Team;
use App\Models\User;
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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->string('name')->nullable();
            $table->string('email')->nullable();

            $table->foreignIdFor(Game::class)->constrained();
            $table->foreignIdFor(Team::class)->constrained();

            $table->boolean('is_winnner')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
