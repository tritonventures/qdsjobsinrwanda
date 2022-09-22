<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedJobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_job_user', function (Blueprint $table) {
            $table->foreignID("job_id")->constrained('jobs')->onDelete("cascade");
            $table->foreignID("user_id")->constrained('users')->onDelete("cascade");
            $table->primary(["job_id", "user_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approved_job_user');
    }
}
