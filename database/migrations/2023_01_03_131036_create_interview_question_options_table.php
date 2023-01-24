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
        Schema::create('interview_question_options', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('question_id');
            $table->text('option_text');
            $table->tinyInteger('is_right_answer')->nullable();
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
        Schema::dropIfExists('interview_question_options');
    }
};
