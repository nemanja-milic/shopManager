<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('working_time_shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shop_id");
            $table->string("day_of_week");
            $table->time("opening_time")->nullable();
            $table->time("closing_time")->nullable();
            $table->timestamps();

            $table->foreign("shop_id")->on("shops")->references("id");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('working_time_shops');
    }
};
