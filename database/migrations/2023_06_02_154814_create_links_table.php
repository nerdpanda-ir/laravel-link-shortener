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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('original',2000)->index();
            $table->string('summary')->unique();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->unsignedBigInteger('creator')->nullable();
            $table->timestamps();

            $table->foreign('creator')
                  ->on('users')->references('id')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
