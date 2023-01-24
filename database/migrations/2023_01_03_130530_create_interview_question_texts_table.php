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
        Schema::create('interview_question_texts', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('question_id');
            $table->integer('language_id');
            $table->text('question_text');
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
        Schema::dropIfExists('interview_question_texts');
    }
};
