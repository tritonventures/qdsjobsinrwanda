<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeadlineToInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->date("deadline")->nullable()->after("created_at");

            $table->dropForeign(['experience_id']);
            $table->foreignID("experience_id")->nullable()->change()->constrained('experience_listing')->onDelete("SET NULL");

            $table->foreignID("company_id")->nullable()->constrained('companies')->onDelete("SET NULL");
        });

        Schema::table('tenders', function (Blueprint $table) {
            $table->foreignID("company_id")->nullable()->constrained('companies')->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internships', function (Blueprint $table) {
            $table->dropColumn('deadline');
            $table->foreignID("experience_id")->nullable()->change()->constrained('experiences')->onDelete("SET NULL");
            $table->dropForeign(['company_id']);
        });
    }
}
