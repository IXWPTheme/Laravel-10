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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('sites_tech_name');
            $table->string('sites_tech_employee_id');            
            $table->string('sites_name');
            $table->string('sites_slug')->unique();
            $table->string('sites_address');
            $table->string('sites_city');
            $table->string('cus_company');
            $table->string('finding_ref');
            $table->string('sites_desc');
            $table->string('sites_image');
            $table->integer('ordering')->default(10000);
            $table->timestamps();
            //$table->string('sites_slug')->unique();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
