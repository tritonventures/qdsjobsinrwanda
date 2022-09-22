<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInternshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_internship', function (Blueprint $table) {
            $table->foreignID("internship_id")->constrained('internships')->onDelete("cascade");
            $table->foreignID("company_id")->constrained('companies')->onDelete("cascade");
            $table->primary(["internship_id", "company_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_internship');
    }
}
