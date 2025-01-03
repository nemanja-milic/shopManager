<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('working_time_shop_exceptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("shop_id");
            $table->string("reason", 20);
            $table->date("date");
            $table->boolean("is_working");
            $table->time("opening_time")->nullable();
            $table->time("closing_time")->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('working_time_shop_exceptions');
    }
};
