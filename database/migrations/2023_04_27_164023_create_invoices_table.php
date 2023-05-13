<?php

use App\Models\Boat;
use App\Models\User;
use App\Models\Marina;
use App\Models\BoatYard;
use App\Models\MarinaStaff;
use App\Enums\Invoice\Status;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Marina::class);
            $table->foreignIdFor(MarinaStaff::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Boat::class)->nullable();
            $table->foreignIdFor(BoatYard::class)->nullable();
            $table->dateTime('issued_at')->default(now());
            $table->dateTime('cancelled_at')->nullable();
            $table->dateTime('paid_at')->nullable();
            $table->dateTime('due_at')->nullable();
            $table->tinyInteger('status')->default(Status::Draft->value);
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
