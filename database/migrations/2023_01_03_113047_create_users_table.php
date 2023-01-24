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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->integer('role_id');
            $table->string('first_name',250)->nullable();
            $table->string('middle_name',250)->nullable();
            $table->string('last_name',250)->nullable();
            $table->string('email',250)->unique();
            $table->string('password',250)->nullable();
            $table->string('phone_number',15)->unique()->nullable();
            $table->string('gender_id',15)->nullable();
            $table->date('date_of_birth')->nullable();
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
        Schema::dropIfExists('users');
    }
};
