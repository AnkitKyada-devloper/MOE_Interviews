<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\Column_migration;

return new class extends Migration
{
    use Column_migration;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_interview_rounds', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('candidate_interview_id');
            $table->uuid('interviews_job_opening_round_id');
            $table->integer('result_in_percentage')->nuallble();
            $table->integer('result_status');
            $table->integer('status_id');
            $table->text('admin_comments')->nullable();
            $table->dateTime('start_time_limit')->nullable();
            $table->dateTime('end_time_limit')->nullable();
            $this->Column_migration($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_interview_rounds');
    }
};
