<?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone_nb');
            $table->string('district');
            $table->string('city');
            $table->string('address');
            $table->string('address_description');
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->float('total_amount');
            $table->string('status')->default('in-progress');
            $table->string('promocode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
