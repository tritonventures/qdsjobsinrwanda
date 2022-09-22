<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovedInternshipUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_internship_user', function (Blueprint $table) {
            $table->foreignID("internship_id")->constrained('internships')->onDelete("cascade");
            $table->foreignID("user_id")->constrained('users')->onDelete("cascade");
            $table->primary(["internship_id", "user_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approved_internship_user');
    }
}
