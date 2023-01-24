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
        Schema::create('candidate_interviews', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('interview_id');
            $table->uuid('candidate_id');
            $table->uuid('interviews_job_opening_id')->nullable();
            $table->integer('qualification_id')->nullable();
            $table->integer('year_of_passing')->nullable();
            $table->integer('reference_id')->nullable();
            $table->integer('status_id');
            $table->integer('result_status');
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
        Schema::dropIfExists('candidate_interviews');
    }
};
