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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_purpose');
            $table->string('account_number');
            $table->string('loan_amount')->nullable();
            $table->string('month')->nullable();
            $table->string('interest')->nullable();
            $table->string('close_date')->nullable();
            $table->bigInteger('interest_amount')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('loans');
        $table->dropSoftDeletes();

    }
};
