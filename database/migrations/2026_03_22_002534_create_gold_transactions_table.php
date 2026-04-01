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
        Schema::create('gold_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); 

            // رقم الجوال والهوية (إجباريين للأمان القانوني، لكن بدون unique للسماح بتكرار الشراء لنفس العميل)
            $table->string('phone'); 
            $table->string('id_number'); 
            $table->string('id_version'); 

            $table->date('birth_date')->nullable(); // اختياري لتجنب أخطاء الإدخال
            $table->string('shop_name'); 
            $table->string('staff_name'); 
            $table->decimal('weight', 8, 2); 
            $table->integer('karat'); 
            $table->decimal('sale_price', 15, 2); 
            $table->string('product_image')->nullable(); 
            $table->foreignId('user_id')->constrained(); 
            $table->string('type'); 
            $table->foreignId('customer_id')->constrained('customers'); // الربط بجدول العملاء
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gold_transactions');
    }
};
