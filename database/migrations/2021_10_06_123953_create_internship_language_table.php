<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_language', function (Blueprint $table) {
            $table->foreignID("internship_id")->constrained('internships')->onDelete("cascade");
            $table->foreignID("language_id")->constrained('languages')->onDelete("cascade");
            $table->primary(["internship_id", "language_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internship_language');
    }
}
