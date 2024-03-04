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
        Schema::create('content', function (Blueprint $table) {
            $table->integer('id',false);
            $table->text('bg_header_image')->nullable();
            $table->text('bg_footer_image')->nullable();
            $table->text('bg_logo_image')->nullable();
            $table->text('home_website_title');
            $table->text('home_welcome_title');
            $table->text('home_welcome_subtitle');
            $table->string('contact_default_email', 255)->nullable();
            $table->longText('contact_adress')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_enable_contact_form')->default(true);
            $table->text('site', 300)->nullable();
            $table->text('instagram', 300)->nullable();
            $table->text('facebook', 300)->nullable();
            $table->text('youtube', 300)->nullable();
            $table->text('whatsApp', 300)->nullable();
            $table->text('spotify')->nullable();
            $table->text('tweeter')->nullable();
            $table->text('medium')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
