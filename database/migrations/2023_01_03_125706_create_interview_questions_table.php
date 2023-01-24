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
        Schema::create('interview_questions', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('round_id');
            $table->uuid('subround_id');
            $table->uuid('job_title_id');
            $table->integer('required_experience_id');
            $table->integer('question_type_id');
            $table->tinyInteger('is_multi_language')->default(0);
            $table->integer('weightage');
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
        Schema::dropIfExists('interview_questions');
    }
};
