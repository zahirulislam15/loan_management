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
        Schema::create('transections', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('account_type')->comment('1=account,2=fdr,3=dps,4=loan,5=office');
            $table->string('transection_type')->nullable();
            $table->string('purpose')->default('no');
            $table->string('expense_by')->nullable();
            $table->integer('status')->default(1);
            $table->string('transection_amount')->nullable();
            $table->string('date')->nullable();

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
        Schema::dropIfExists('transections');
        $table->dropSoftDeletes();

    }
};
