<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_user', function (Blueprint $table) {
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
        Schema::dropIfExists('internship_user');
    }
}
