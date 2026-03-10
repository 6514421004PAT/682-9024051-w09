<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id(); // คีย์หลัก (id bigint)
            $table->string('mov_name_th', 200); // ชื่อภาพยนตร์ภาษาไทย
            $table->integer('mov_year'); // ปีที่เข้าฉาย
            $table->float('mov_budget'); // งบประมาณ (ล้านบาท)
            $table->float('mov_income'); // รายได้ (ล้านบาท)
            
            // รหัสตัวแทนจำหน่าย (Foreign Key)
            $table->unsignedBigInteger('mov_dtc_id'); 
            
            $table->timestamps();

            // การสร้างความสัมพันธ์ (Constraint) ระหว่างตาราง
            $table->foreign('mov_dtc_id')
                  ->references('id')
                  ->on('distributors')
                  ->onDelete('cascade'); // ถ้าลบตัวแทนจำหน่าย ข้อมูลหนังจะถูกลบด้วย
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};