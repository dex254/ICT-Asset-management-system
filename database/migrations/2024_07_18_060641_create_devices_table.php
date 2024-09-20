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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('image_name1');
            $table->string('image_name2');
            $table->string('image_name3');
            $table->string('sno');
            $table->string('tag');
            $table->string('model');
            $table->string('desc');
            $table->string('category');
            $table->string('status');
            $table->string('con');
           ////
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
