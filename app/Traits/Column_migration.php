<?php
  
namespace App\Traits;

use Illuminate\Support\Facades\DB;
  
trait Column_migration {
    
  
    public function Column_migration($table) {
        $table->tinyInteger('is_active')->default(1);
        $table->uuid('created_by');
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->uuid('updated_by');
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    }
  
}