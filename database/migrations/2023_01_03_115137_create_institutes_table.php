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
        Schema::create('institutes', function (Blueprint $table) {
            $table->uuid('id')->nullable(false)->primary();
            $table->string('institute_name', 250)->unique();
            $table->string('email', 250)->unique();
            $table->string('phone_number', 15);
            $table->string('address_line_1', 250);
            $table->string('address_line_2', 250)->nullable();
            $table->string('address_line_3', 250)->nullable();
            $table->string('city', 250);
            $table->string('state', 250);
            $table->string('country', 250);
            $table->string('pincode', 10);
            $table->text('other_info')->nullable();
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
        Schema::dropIfExists('institutes');
    }
};
