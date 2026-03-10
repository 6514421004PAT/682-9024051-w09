<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id(); // คีย์หลัก (Auto ID)
            $table->string('dtb_name', 100); // ชื่อตัวแทนจำหน่าย (Varchar 100)
            $table->timestamps(); // สร้าง created_at และ updated_at อัตโนมัติ
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributors');
    }
};