<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // مالك العقار
            $table->string('title'); // عنوان الإعلان
            $table->text('description'); // وصف العقار
            $table->decimal('price', 10, 2); // السعر
            $table->string('address'); // العنوان
            $table->enum('type', ['rent', 'sale']); // نوع العرض (إيجار أو بيع)
            $table->integer('bedrooms')->default(0); // عدد غرف النوم
            $table->integer('bathrooms')->default(0); // عدد الحمامات
            $table->float('area')->nullable(); // المساحة بالمتر المربع
            $table->integer('floor')->nullable(); // الطابق
            $table->integer('total_floors')->nullable(); // إجمالي الطوابق في المبنى
            $table->year('construction_year')->nullable(); // سنة البناء
            $table->enum('furnished', ['furnished', 'semi_furnished', 'unfurnished'])->default('unfurnished'); // مفروش أم لا
            $table->json('amenities')->nullable(); // المرافق (مثل: مصعد، مواقف، مسبح)
            $table->string('city'); // المدينة
            $table->string('neighborhood')->nullable(); // الحي
            $table->decimal('latitude', 10, 8)->nullable(); // إحداثيات خط العرض
            $table->decimal('longitude', 11, 8)->nullable(); // إحداثيات خط الطول
            $table->enum('status', ['available', 'sold', 'rented', 'pending'])->default('available'); // حالة العقار
            $table->json('images')->nullable(); // قائمة الصور (مسار الصورة، نوع الغرفة، وصف)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};