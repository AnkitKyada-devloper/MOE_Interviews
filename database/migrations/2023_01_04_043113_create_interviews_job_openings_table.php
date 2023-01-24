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
        Schema::create('interviews_job_openings', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('interview_id');
            $table->uuid('job_title_id');
            $table->char('employement_type_id',10);
            $table->char('number_of_openings',10)->nullable();
            $table->char('job_location_id',10)->nullable();
            $table->char('required_experience',10)->nullable();
            $table->string('required_qualification',100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('interviews_job_openings');
    }
};
