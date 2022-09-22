<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('internships');

        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('location')->nullable();
            $table->boolean('is_employed')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(1);
            $table->foreignID('created_by')->nullable()->constrained('users')->onDelete("set null");
            $table->foreignID("nationality_id")->nullable()->constrained('nationalities')->onDelete("SET NULL");
            $table->foreignID("proffession_id")->nullable()->constrained('proffessions')->onDelete("SET NULL");
            $table->foreignID("experience_id")->nullable()->constrained('experiences')->onDelete("SET NULL");
            $table->foreignID("education_id")->nullable()->constrained('educations')->onDelete("SET NULL");
            $table->foreignID("salary_id")->nullable()->constrained('salaries')->onDelete("SET NULL");
            $table->timestamps();
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
        Schema::dropIfExists('internships');
    }
}
