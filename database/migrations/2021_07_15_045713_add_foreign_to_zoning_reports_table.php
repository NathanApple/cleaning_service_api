<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToZoningReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zoning_reports', function (Blueprint $table) {
            $table->foreign('user_task_id')->on('user_tasks')
            ->references('id')
            ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('zoning_id')->on('zonings')
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
        Schema::table('zoning_reports', function (Blueprint $table) {
            //
        });
    }
}
