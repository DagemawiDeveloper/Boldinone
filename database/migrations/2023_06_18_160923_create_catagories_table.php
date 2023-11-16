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
        Schema::create('catagories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catagory_id')->unsigned()->nullable();
            $table->string('catagory_name');
            $table->string('catagory_description');
            $table->string('catagory_image');
            $table->string('service_list_by');
            $table->enum('status', ['1', '0'])->default('1');
            $table->foreign('catagory_id')->references('id')->on('catagories')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catagories');
    }
};