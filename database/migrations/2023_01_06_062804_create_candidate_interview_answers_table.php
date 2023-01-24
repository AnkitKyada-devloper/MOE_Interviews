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
        Schema::create('candidate_interview_answers', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('candidate_interview_round_id');
            $table->uuid('candidate_interview_sub_round_id');
            $table->uuid('interview_question_id');
            $table->text('answer');
            $table->uuid('answer_id')->nullable();
            $table->text('attachment')->nullable();
            $table->integer('score')->nullable();
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
        Schema::dropIfExists('candidate_interview_answers');
    }
};
