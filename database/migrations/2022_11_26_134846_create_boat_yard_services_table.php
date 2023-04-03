<?php

use App\Models\BoatYard;
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
        Schema::create('boat_yard_services', function (Blueprint $table) {
            $table->id();
            $table->string('notes')->nullable();
            $table->string('name');
            $table->string('price');
            $table->integer('vat_rate');
            $table->string('currency');
            $table->boolean('is_active')->default(true);
            $table->foreignIdFor(BoatYard::class);
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
        Schema::dropIfExists('boat_yard_services');
    }
};
