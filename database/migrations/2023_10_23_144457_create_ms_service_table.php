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
        Schema::create('ms_service', function (Blueprint $table) {
            $table->id('ms_service_id');
            $table->string('ms_service_name_en');
            $table->string('ms_service_name_ar');
            $table->string('ms_service_name_cn');
            $table->decimal('ms_service_fees', 10, 2);
            $table->unsignedBigInteger('ms_service_created_by');
            $table->timestamp('ms_service_created_date')->useCurrent();
            $table->unsignedBigInteger('ms_service_updated_by')->nullable();
            $table->timestamp('ms_service_updated_date')->nullable();

            // $table->foreign('ms_service_created_by')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ms_service_updated_by')->references('ws_user_id')->on('ws_user');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_service');
    }
};
