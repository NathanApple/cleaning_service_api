<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zoning_detail_report_id')->nullable();
            $table->unsignedBigInteger('checklist_id')->nullable();
            $table->boolean('checklist_status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checklist_reports');
    }
}
