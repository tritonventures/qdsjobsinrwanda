<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string("company");
            $table->string("position");
            $table->date("start_date");
            $table->date("end_date")->nullable();
            $table->timestamps();

            $table->foreignID("listing_id")->nullable()->constrained('experience_listing')->onDelete("set null");
            $table->foreignID("user_id")->constrained("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('despatch_discrepancies', function ($table) {
            $table->dropForeign(['listing_id', "user_id"]);
        });
        Schema::dropIfExists('experiences');
    }
}
