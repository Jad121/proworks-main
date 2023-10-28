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
        Schema::create('ws_employee', function (Blueprint $table) {
            $table->id('ms_employee_id');
            $table->unsignedBigInteger('ms_company_id');
            $table->unsignedBigInteger('ms_country_id');
            $table->unsignedBigInteger('ms_service_id');
            $table->unsignedBigInteger('ms_status_id');
            $table->unsignedBigInteger('ws_user_id');
            $table->string('ms_employee_name');
            $table->string('ms_employee_boarder_nb');
            $table->string('ms_employee_payment_proof_nb');
            $table->string('ms_employee_iqama_nb');
            $table->date('ms_employee_iqama_dob');
            $table->date('ms_employee_iqama_expiry');
            $table->decimal('ms_employee_fees', 10, 2);
            $table->timestamp('ms_employee_requested_date')->useCurrent();
            $table->timestamp('ms_employee_completed_date')->nullable();
            $table->boolean('ms_employee_is_invoice');
            $table->text('ms_employee_comment')->nullable();
            $table->unsignedBigInteger('ms_employee_created_by');
            $table->timestamp('ms_employee_created_date')->useCurrent();
            $table->unsignedBigInteger('ms_employee_updated_by')->nullable();
            $table->timestamp('ms_employee_updated_date')->nullable();

            // $table->foreign('ms_company_id')->references('ms_company_id')->on('ms_company');
            // $table->foreign('ms_country_id')->references('ws_country_id')->on('ws_country');
            // $table->foreign('ms_service_id')->references('ms_service_id')->on('ms_service');
            // $table->foreign('ms_status_id')->references('ms_status_id')->on('ms_status');
            // $table->foreign('ws_user_id')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ms_employee_created_by')->references('ws_user_id')->on('ws_user');
            // $table->foreign('ms_employee_updated_by')->references('ws_user_id')->on('ws_user');
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ws_employee');
    }
};
