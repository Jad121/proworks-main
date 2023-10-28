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
        Schema::create('ms_status', function (Blueprint $table) {
            $table->id('ms_status_id');
            $table->string('ms_status_name_en');
            $table->string('ms_status_name_ar');
            $table->string('ms_status_name_cn');
            $table->string('ms_status_key');
            $table->unsignedBigInteger('ms_status_created_by');
            $table->timestamp('ms_status_created_date')->useCurrent();
            $table->unsignedBigInteger('ms_status_updated_by')->nullable();
            $table->timestamp('ms_status_updated_date')->nullable();

            // $table->foreign('ms_status_created_by')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ms_status_updated_by')->references('ws_user_id')->on('ws_user');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_status');
    }
};
