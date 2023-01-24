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
        Schema::create('configurations', function (Blueprint $table) {
            $table->integer('id')->nullable(false)->primary();
            $table->string('conf_key',250);
            $table->string('conf_value',250);
            $table->string('display_text',250);
            $table->text('description')->nullable();
            $table->integer('display_order')->default(0);
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
        Schema::dropIfExists('configurations');
    }
};
