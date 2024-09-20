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
        Schema::create('devreturns', function (Blueprint $table) {
            $table->id();
            $table->string('iden');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('dept');
            $table->string('type');
            $table->string('event');
            $table->string('PAD');
            $table->string('SRD');
            $table->string('fine');
            $table->string('status');
            $table->string('sno');
            $table->string('devmodel');
            $table->string('devtag');
            $table->date('ADate');
            $table->date('ERD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devreturns');
    }
};
