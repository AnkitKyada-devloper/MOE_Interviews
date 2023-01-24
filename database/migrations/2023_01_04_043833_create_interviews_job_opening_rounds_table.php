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
        Schema::create('interviews_job_opening_rounds', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('interviews_job_opening_id');
            $table->uuid('round_id');
            $table->integer('display_order');
            $table->tinyInteger('is_interactive_round')->default(0);
            $table->tinyInteger('is_automatic_pass')->default(0);
            $table->integer('passing_criteria')->nullable();
            $table->integer('number_of_question_display')->nullable();
            $table->tinyInteger('is_question_randomized')->default(0)->nullable();
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
        Schema::dropIfExists('interviews_job_opening_rounds');
    }
};