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
        Schema::create('meter_readings', function (Blueprint $table) {
            $table->id();
            $table->string('hall_name');           // اسم الكوشة
            $table->string('client_name');         // الاسم
            $table->integer('previous_meter');     // العداد السابق
            $table->integer('current_meter');      // العداد الحالي
            $table->integer('total');              // المجموع
            $table->decimal('amount', 10, 2);      // المبلغ
            $table->text('notes')->nullable();     // ملاحظات
            $table->string('status')->nullable();  // واصل / غير واصل
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meter_readings');
    }
};
