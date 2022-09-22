<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProffessionTenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proffession_tender', function (Blueprint $table) {
            $table->foreignID("proffession_id")->constrained('proffessions')->onDelete("cascade");
            $table->foreignID("tender_id")->constrained('tenders')->onDelete("cascade");
            $table->primary(["proffession_id", "tender_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proffession_tender');
    }
}
