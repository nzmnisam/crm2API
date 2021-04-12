<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('title');
            $table->string('phone');
            $table->string('email');
            $table->string('contact_method'); //email. phone, no preference
            //company
            $table->string('company');
            $table->string('address');
            $table->string('address2');
            $table->string('city');
            $table->string('zip_code');
            $table->string('website_url');
            $table->dateTime('follow_up_date');
            $table->text('notes');
            $table->double('deal_size');
            $table->unsignedInteger('stage_id');
            $table->unsignedInteger('staff_id');//koji sales rep ima kog kontakta
            $table->foreign('stage_id')->referenfces('id')->on('stages');
            $table->foreign('staff_id')->references('id')->on('staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
