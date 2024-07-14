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
    Schema::table('loans', function (Blueprint $table) {
        $table->date('start_date')->nullable(); 
        $table->string('frequency')->nullable(); 
        
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('frequency');
        });
    }
};
