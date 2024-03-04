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
        Schema::create('rulings', function (Blueprint $table) {
            $table->id();
            $table->text('slug');
            $table->text('title');
            $table->longText('resume')->nullable();
            $table->longText('description');
            $table->date('publish_date');
            $table->date('expiration_date');
            $table->text('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rulings');
    }
};
