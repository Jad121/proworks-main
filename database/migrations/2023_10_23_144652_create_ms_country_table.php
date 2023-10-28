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
        Schema::create('ws_country', function (Blueprint $table) {
            $table->id('ws_country_id');
            $table->string('ws_country_name_en');
            $table->string('ws_country_name_ar');
            $table->string('ws_country_name_cn');
            $table->unsignedBigInteger('ws_country_created_by');
            $table->timestamp('ws_country_created_date')->useCurrent();
            $table->unsignedBigInteger('ws_country_updated_by')->nullable();
            $table->timestamp('ws_country_updated_date')->nullable();

            // $table->foreign('ws_country_created_by')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ws_country_updated_by')->references('ws_user_id')->on('ws_user');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ws_country');
    }
};
