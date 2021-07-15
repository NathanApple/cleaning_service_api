<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoningReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoning_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_task_id')->nullable();
            $table->unsignedBigInteger('zoning_id')->nullable();
            $table->string('before_photo_path', 2048)->nullable()->unique();
            $table->string('after_photo_path', 2048)->nullable()->unique();
            $table->string('report')->nullable();
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
        Schema::dropIfExists('zoning_reports');
    }
}
