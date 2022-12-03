<?php

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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('registration');
            $table->string('vin')->nullable();
            $table->string('color')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('primary_image_url')->nullable();
            $table->float('co2_emissions')->nullable();
            $table->float('engine_capacity')->nullable();
            $table->date('registered_on')->nullable();
            $table->date('mot_due_on')->nullable();
            $table->date('tax_due_on')->nullable();
            $table->date('insurance_renews_on')->nullable();
            $table->date('congestion_charge_renews_on')->nullable();
            $table->foreignIdFor(User::class);
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
        Schema::dropIfExists('cars');
    }
};
