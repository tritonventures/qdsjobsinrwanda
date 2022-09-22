<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_job', function (Blueprint $table) {
            $table->foreignID("job_id")->constrained('jobs')->onDelete("cascade");
            $table->foreignID("company_id")->constrained('companies')->onDelete("cascade");
            $table->primary(["job_id", "company_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_job');
    }
}
