<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;
use Illuminate\Support\Str;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            'id' => Str::uuid()->toString(),
            'user_role' => 'IT',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Roles::insert([
            'id' => Str::uuid()->toString(),
            'user_role' => 'Admin',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Roles::insert([
            'id' => Str::uuid()->toString(),
            'user_role' => 'Institute User',
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}