<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_user', function (Blueprint $table) {
            $table->foreignID("education_id")->nullable()->constrained('educations')->onDelete("SET NULL");
            $table->foreignID("user_id")->constrained('users')->onDelete("cascade");
            $table->primary(['start_date', "user_id"]);
            $table->string("school_name");
            $table->date("start_date");
            $table->date("end_date");
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
        Schema::dropIfExists('education_user');
    }
}
