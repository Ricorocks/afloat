<?php

use App\Models\Berth;
use App\Models\Boat;
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
        Schema::create('berth_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Berth::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Boat::class);
            $table->date('starts_at');
            $table->date('ends_at');
            $table->string('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berth_contracts');
    }
};
