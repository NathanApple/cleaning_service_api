<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToZoningDetailReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zoning_detail_reports', function (Blueprint $table) {
            $table->foreign('zoning_report_id')->on('zoning_reports')
            ->references('id')
            ->onDelete('set null')->onUpdate('cascade'); 
            $table->foreign('zoning_detail_id')->on('zoning_details')
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
        Schema::table('zoning_detail_reports', function (Blueprint $table) {
            //
        });
    }
}
