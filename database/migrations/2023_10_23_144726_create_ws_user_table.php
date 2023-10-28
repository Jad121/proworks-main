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
        Schema::create('ws_user', function (Blueprint $table) {
            $table->id('ws_user_id');
            $table->unsignedBigInteger('ws_country_id');
            $table->string('ws_user_first_name');
            $table->string('ws_user_last_name');
            $table->string('ws_user_email')->unique();
            $table->string('ws_user_password');
            $table->string('ws_user_phone')->nullable();
            $table->string('ws_user_address')->nullable();
            $table->unsignedBigInteger('ws_user_created_by');
            $table->timestamp('ws_user_created_date')->useCurrent();
            $table->unsignedBigInteger('ws_user_updated_by')->nullable();
            $table->timestamp('ws_user_updated_date')->nullable();

           
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ws_user');
    }
};
