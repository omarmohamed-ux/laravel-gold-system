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
            $table->string('customer_name');       // اسم العميل الثلاثي
            $table->string('phone')->unique()->nullable();               // رقم الجوال
            $table->string('id_number')->unique()->nullable(); // رقم الهوية/الاقامة
            $table->date('birth_date');            // تاريخ الميلاد
            $table->string('id_version')->unique()->nullable(); // رقم نسخة الهوية
            $table->string('shop_name');           // اسم المحل (المشتري)
            $table->string('staff_name');          // اسم الموظف من المحل
            $table->decimal('weight', 8, 2);       // الوزن
            $table->integer('karat');              // العيار
            $table->decimal('sale_price', 15, 2);  // سعر البيع
            $table->string('product_image')->nullable(); //  صورة المنتج
            $table->foreignId('user_id')->constrained(); // الموظف الذي قام بالإدخال 
            $table->string('type'); // نوع العمليه البيع او الشراء
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
