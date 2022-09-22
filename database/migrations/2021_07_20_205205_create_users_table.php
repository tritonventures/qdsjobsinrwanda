<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('age')->nullable();
            $table->date('dob')->nullable()->default(null);
            $table->string('user_type');
            $table->string('skills')->nullable();
            $table->boolean('is_employed')->nullable()->default(0);
            $table->boolean('is_active')->nullable()->default(1);
            $table->foreignID("gender_id")->nullable()->constrained('genders')->onDelete("set null");
            $table->foreignID("nationality_id")->nullable()->constrained('nationalities')->onDelete("set null");
            $table->foreignID("proffession_id")->nullable()->constrained('proffessions')->onDelete("set null");
            $table->foreignID("salary_id")->nullable()->constrained('salaries')->onDelete("set null");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
