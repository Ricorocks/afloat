<?php

use App\Models\Marina;
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
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('make')->nullable();
            $table->integer('length_in_cm');
            $table->integer('width_in_cm');
            $table->integer('draught_in_cm');
            $table->string('type')->nullable();
            $table->date('date_of_construction')->nullable();
            $table->string('insurance_number')->nullable();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Marina::class);
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
        Schema::dropIfExists('boats');
    }
};
