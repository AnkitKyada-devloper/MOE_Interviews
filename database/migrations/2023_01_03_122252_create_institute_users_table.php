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
        Schema::create('institute_users', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->uuid('institute_id');
            $table->uuid('user_id');
            $table->integer('institute_user_role_id');
            $table->integer('status');
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
        Schema::dropIfExists('institute_users');
    }
};
