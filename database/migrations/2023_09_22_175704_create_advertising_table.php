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
        Schema::create('advertisings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('ads_image');
            $table->string('list_by');
            $table->string('catagory');
            $table->longText('promoted_des')->nullable();
            $table->string('subject')->nullable();
            $table->string('title')->nullable();
            $table->string('title_color')->nullable();
            $table->string('subject_color')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisings');
    }
};