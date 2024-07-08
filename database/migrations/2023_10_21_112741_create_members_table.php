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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default(1)->comment('1=>personal', '2=>company', '3=>student');
            $table->string('name');
            $table->string('name_bn')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('present_address')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('dob')->nullable();
            $table->string('birth_id')->nullable();
            $table->string('nid')->nullable();
            $table->string('mobile')->nullable();
            $table->string('profession')->nullable();
            $table->string('signature')->nullable();

            $table->string('image')->nullable();
            $table->string('nominee_signature')->nullable();
            $table->string('nid_image')->nullable();

            //nominee
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->string('nominee_father_name')->nullable();
            $table->string('nominee_mother_name')->nullable();
            $table->string('nominee_nid')->nullable();
            $table->string('nominee_birth_id')->nullable();
            $table->string('nominee_dob')->nullable();
            $table->string('nominee_present_address')->nullable();
            $table->string('nominee_profession')->nullable();
            $table->string('nominee_image')->nullable();

            //company
            $table->string('company_type')->nullable();
            $table->string('account_mantain')->nullable();
            $table->string('account_mantainer')->nullable();
            $table->string('company_address')->nullable();

            $table->string('trade_license')->nullable();
            $table->string('tin')->nullable();
            $table->string('issued_by')->nullable();

            $table->string('issue_date')->nullable();
            $table->bigInteger('account_number');
            $table->bigInteger('id_number')->nullable();
            $table->integer('status')->default(1);
            $table->string('personal_amount')->nullable();
            $table->bigInteger('withdraw_amount')->nullable();


            $table->string('garanteer_name')->nullable();
            $table->string('garanteer_signature')->nullable();
            $table->string('garanteer_name_bn')->nullable();
            $table->string('garanteer_nid')->nullable();
            $table->string('garanteer_image')->nullable();
            $table->string('garanteer_phone')->nullable();


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
        Schema::dropIfExists('members');
        $table->dropSoftDeletes();

    }
};
