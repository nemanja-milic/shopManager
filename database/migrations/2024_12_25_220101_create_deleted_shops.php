<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("deleted_shops", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("shop_id");
            $table->string("name", 100);
            $table->unsignedBigInteger("country_id");
            $table->string("city", 50);
            $table->string("street", 60);
            $table->timestamps();
            $table->foreign("country_id")->on("countries")->references("id");

        });
    }

    public function down(): void
    {
        //
    }
};
