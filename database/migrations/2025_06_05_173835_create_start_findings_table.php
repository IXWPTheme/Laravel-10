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
        Schema::create('start_findings', function (Blueprint $table) {
            $table->id();
            $table->integer('find_site_id');
            $table->integer('find_unit_id');
            $table->integer('find_reference_id');
            $table->string('find_name');
            $table->string('find_slug')->unique();
            $table->string('find_desc');
            $table->text('find_before_img')->nullable(); 
            $table->text('find_after_img')->nullable();   
            $table->string('find_status')->default('NEW');;  
            $table->integer('ordering')->default(10000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('start_findings');
    }
};
