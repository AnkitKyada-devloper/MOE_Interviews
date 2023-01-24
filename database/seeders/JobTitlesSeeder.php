<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job_titles;
use Ramsey\Uuid\Nonstandard\Uuid;
class JobTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job_titles::insert([
            'id' => Uuid::uuid4(),
            'name' => 'developer',
            'description'=>'backend developer',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}