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
        Schema::create('cycle_register', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('cycle_id')->unsigned();
            $table->unsignedBigInteger('module_id')->unsigned();
            $table->unsignedBigInteger('year')->unsigned();
            $table->boolean('pass')->nullable();
            $table->unique(['user_id', 'cycle_id', 'module_id', 'year']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cycle_id')->references('id')->on('cycles');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cycle_register');
    }
};
