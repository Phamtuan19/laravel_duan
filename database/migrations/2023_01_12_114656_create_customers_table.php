<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('province'); // tỉnh
            $table->string('district'); // huyện
            $table->string('ward'); // xã
            $table->string('specific_address'); // địa chỉ cụ thể
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}