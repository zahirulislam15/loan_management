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
        Schema::create('d_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('type');
            $table->string('type_amount')->nullable();
            $table->string('interest')->nullable();
            $table->string('month')->nullable();
            $table->string('amount')->nullable();
            $table->string('close_date')->nullable();

            $table->bigInteger('interest_amount')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->bigInteger('withdraw_amount')->nullable();

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
        Schema::dropIfExists('d_p_s');
        $table->dropSoftDeletes();
    }
};
