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
        Schema::create('interviews', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('institute_id');
            $table->string('title',250);
            $table->string('unique_title',100)->unique();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('location',250);
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
        Schema::dropIfExists('interviews');
    }
};
