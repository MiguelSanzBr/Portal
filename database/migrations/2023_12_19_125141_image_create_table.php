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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('describe');
            $table->string('files_path');
            $table->text('files_name');
            $table->integer('adminCheck')->default(0);
           $table->unsignedBigInteger('user_id');
           $table->foreign('user_id')->references('id')->on('users');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('images');
    }
};
