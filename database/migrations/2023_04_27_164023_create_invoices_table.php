<?php

use App\Models\Boat;
use App\Models\BoatYard;
use App\Models\Marina;
use App\Models\MarinaStaff;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->dateTime('issued_at')->default(now());
            $table->dateTime('cancelled_at')->nullable();
            $table->date('due_at')->nullable();
            $table->foreignIdFor(Marina::class);
            $table->foreignIdFor(MarinaStaff::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Boat::class)->nullable();
            $table->foreignIdFor(BoatYard::class)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
