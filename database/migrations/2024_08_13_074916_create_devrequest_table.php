<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devrequest', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('iden');
            $table->string('email');
            $table->string('phone');
            $table->string('dept');
            $table->string('type');
            $table->string('event');
            $table->date('PAD');
            $table->date('SRD');
            $table->string('status');
            $table->string('fine')->nullable();
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
        Schema::dropIfExists('devrequest');
    }
}
