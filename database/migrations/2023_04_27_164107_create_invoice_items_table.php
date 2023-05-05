<?php

use App\Models\BoatYardService;
use App\Models\Invoice;
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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('amount')->default('0');
            $table->string('currency')->default('GBP');
            $table->integer('vat_rate')->default(0);
            $table->integer('quantity')->default(1);
            $table->foreignIdFor(Invoice::class);
            $table->foreignIdFor(BoatYardService::class)->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
};
