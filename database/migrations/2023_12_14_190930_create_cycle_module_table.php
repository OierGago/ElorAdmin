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
        Schema::create('cycle_module', function (Blueprint $table) {
            $table->unsignedBigInteger('cycle_id')->unsigned();
            $table->unsignedBigInteger('module_id')->unsigned();

            $table->unique(['cycle_id', 'module_id']);
            $table->foreign('cycle_id')->references('id')->on('cycles')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_users');
    }
};
