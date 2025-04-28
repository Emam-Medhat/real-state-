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
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id(); // الرقم التعريفي
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // المستخدم الذي أرسل الطلب
            $table->foreignId('property_id')->constrained()->onDelete('cascade'); // العقار المرتبط بالطلب
            $table->enum('issue_type', ['plumbing', 'electrical', 'structural', 'other']); // نوع المشكلة
            $table->text('description'); // وصف المشكلة
            $table->enum('priority', ['urgent', 'normal'])->default('normal'); // مستوى الأهمية
            $table->string('images')->nullable(); // الصور المرفقة
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled'])->default('pending'); // حالة الطلب
            $table->date('requested_date')->nullable(); // تاريخ تقديم الطلب
            $table->date('scheduled_date')->nullable(); // تاريخ الصيانة المجدولة
            $table->date('completion_date')->nullable(); // تاريخ إكمال الصيانة
            $table->foreignId('assigned_technician_id')->nullable()->constrained('users')->nullOnDelete(); // الفني المسؤول عن الطلب
            $table->text('technician_notes')->nullable(); // ملاحظات الفني
            $table->text('customer_feedback')->nullable(); // ملاحظات العميل بعد الصيانة
            $table->timestamps(); // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_requests');
    }
};