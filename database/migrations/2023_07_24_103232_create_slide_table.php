<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->id();
            $table->string('slide_image')->nullable();
            $table->string('list_by');
            $table->string('catagory');
            $table->string('promoted_des');
            $table->string('subject');
            $table->string('title');
            $table->string('title_color');
            $table->string('subject_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide');
    }
};