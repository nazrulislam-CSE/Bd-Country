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
        Schema::create('districts', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedInteger('division_id'); 
            $table->string('name_en', 25); 
            $table->string('name_bn', 25); 
            $table->tinyInteger('status')->default(1); 
            $table->string('lat', 15)->nullable(); 
            $table->string('lon', 15)->nullable(); 
            $table->string('url'); 

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
