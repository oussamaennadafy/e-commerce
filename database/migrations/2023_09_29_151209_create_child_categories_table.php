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
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subCategory_id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->timestamps();


            $table->foreign('subCategory_id')
                ->references('id')->on('sub_categories')->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_categories');
    }
};
