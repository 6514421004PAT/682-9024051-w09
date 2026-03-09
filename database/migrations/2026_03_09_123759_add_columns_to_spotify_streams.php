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
        Schema::table('spotify_streams', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('spotify_streams', function (Blueprint $table) {
    $table->string('track_name')->after('id');
    $table->bigInteger('streams_count')->after('track_name');
});
    }
};
