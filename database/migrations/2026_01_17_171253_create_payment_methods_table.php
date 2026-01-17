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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('name', 100);           // KBZ Pay, Wave Pay, Bank Transfer
            $table->string('code', 50)->unique();  // kbz_pay, wave_pay, bank_transfer
            $table->string('type', 50);            // qr, bank, online

            // Bank Info (for bank transfer)
            $table->string('bank_name', 100)->nullable();
            $table->string('account_name', 100)->nullable();
            $table->string('account_number', 100)->nullable();

            // QR Image (for KBZ Pay, Wave Pay)
            $table->string('qr_image')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            // Description
            $table->text('description')->nullable();

            // Audit
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
