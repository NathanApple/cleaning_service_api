<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToChecklistReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checklist_reports', function (Blueprint $table) {
                $table->foreign('zoning_detail_report_id')->on('zoning_detail_reports')
                ->references('id')
                ->onDelete('set null')->onUpdate('cascade'); 

                $table->foreign('checklist_id')->on('checklists')
                ->references('id')
                ->onDelete('set null')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checklist_reports', function (Blueprint $table) {
            //
        });
    }
}
