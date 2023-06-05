<?php

use App\Models\Marina;
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
        Schema::create('tides', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Marina::class);
            $table->integer('height');
            $table->dateTime('happens_at');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tides');
    }
};
