<?php

declare(strict_types=1);

use App\Enums\Address\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable');
            $table->tinyInteger('type')->default(Type::Location->value);
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('city');
            $table->string('county')->nullable();
            $table->string('country');
            $table->string('postcode')->nullable();
            $table->string('alpha_two_code')->nullable();
            $table->string('alpha_three_code')->nullable();
            $table->point('location')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
