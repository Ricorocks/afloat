<?php

use App\Models\Marina;
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
        Schema::create('berths', function (Blueprint $table) {
            $table->id();
            $table->string('leg');
            $table->string('berth_number');
            $table->string('internal_id')->nullable();
            $table->integer('max_length_in_cm');
            $table->integer('max_width_in_cm');
            $table->integer('max_draught_in_cm');
            $table->integer('overlay_x')->default(0);
            $table->integer('overlay_y')->default(0);
            $table->integer('overlay_rotate')->default(0);
            $table->foreignIdFor(Marina::class);
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
        Schema::dropIfExists('berths');
    }
};
