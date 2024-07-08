<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inner_transections', function (Blueprint $table) {
            $table->id();
            $table->string('transection_type')->comment('1=income,2=expense');
            $table->string('purpose');
            $table->string('expense_by')->nullable();
            $table->string('amount')->nullable();
            $table->string('status')->default(1);
            $table->string('date')->nullable();
            $table->string('income_from')->nullable();
            $table->string('transection_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inner_transections');
        $table->dropSoftDeletes();

    }
};
