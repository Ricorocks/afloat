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
        Schema::create('berth_booking_rates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->date('starts_at');
            $table->date('ends_at');
            $table->integer('max_length_in_cm')->default(0);
            $table->integer('min_length_in_cm')->default(0);
            $table->string('day_rate_per_meter')->default(0);
            $table->string('currency')->default('GBP');
            $table->foreignIdFor(Marina::class);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berth_booking_rates');
    }
};
