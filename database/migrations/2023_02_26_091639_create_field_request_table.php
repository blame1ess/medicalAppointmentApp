<?php

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
        Schema::create('field_request', function (Blueprint $table) {
            $table->id();
            $table->string('field');
            $table->unsignedBigInteger('requester_id');
            $table->string('status')->default('active');
            $table->string('message');
            $table->timestamps();
            $table->foreign('requester_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_request');
    }
};
