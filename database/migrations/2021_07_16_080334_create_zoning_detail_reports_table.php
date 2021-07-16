<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoningDetailReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoning_detail_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zoning_report_id')->nullable();
            $table->unsignedBigInteger('zoning_detail_id')->nullable();
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
        Schema::dropIfExists('zoning_detail_reports');
    }
}
