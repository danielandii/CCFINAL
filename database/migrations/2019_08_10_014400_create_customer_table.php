<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100);
            $table->string('password', 100);
            $table->string('male_name', 100);
            $table->string('female_name', 100);
            $table->timestamp('event_date');
            $table->integer('plan_id');
            $table->text('address1');
            $table->text('address2')->nullable();
            $table->string('family1', 100)->nullable();
            $table->string('family2', 100)->nullable();
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
        Schema::dropIfExists('customer');
    }
}
