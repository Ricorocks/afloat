<?php

use App\Models\Berth;
use App\Models\BerthBookingRate;
use App\Models\Boat;
use App\Models\InvoiceItem;
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
        Schema::create('berth_bookings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('starts_at');
            $table->date('ends_at');
            $table->foreignIdFor(Berth::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Boat::class)->nullable();
            $table->foreignIdFor(BerthBookingRate::class)->nullable();
            $table->foreignIdFor(InvoiceItem::class)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berth_bookings');
    }
};
