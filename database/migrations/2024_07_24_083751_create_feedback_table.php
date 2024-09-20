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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('staffiden');
            $table->string('staffname');
            $table->string('staffphone');
            $table->string('staffemail');
            $table->string('date');
            $table->string('subject');
            $table->string('message');
            $table->string('reply')->nullable();
            $table->string('replydate')->nullable();
            $table->string('adminname')->nullable();
            $table->string('adminphone')->nullable();
            $table->string('adminemail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
