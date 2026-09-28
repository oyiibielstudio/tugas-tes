<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('author')->nullable();
            $table->integer('harga')->default(0);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};