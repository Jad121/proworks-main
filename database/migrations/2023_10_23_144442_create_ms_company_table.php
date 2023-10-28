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
        Schema::create('ms_company', function (Blueprint $table) {
            $table->id('ms_company_id');
            $table->string('ms_company_name_en');
            $table->string('ms_company_name_ar');
            $table->string('ms_company_name_cn');
            $table->unsignedBigInteger('ms_company_created_by'); // Ensure the same data type
            $table->timestamp('ms_company_created_date')->useCurrent();
            $table->unsignedBigInteger('ms_company_updated_by')->nullable();
            $table->timestamp('ms_company_updated_date')->nullable();

            // $table->foreign('ms_company_created_by')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ms_company_updated_by')->references('ws_user_id')->on('ws_user');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_company');
    }
};
