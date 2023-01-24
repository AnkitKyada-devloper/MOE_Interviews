<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Roles::where('user_role','Admin')->first()->id;
        $it = Roles::where('user_role','IT')->first()->id;
        $institute_user = Roles::where('user_role','Institute User')->first()->id;
        Users::insert([
            'id' => Str::uuid()->toString(),
            'role_id' => $it,
            'first_name' => 'IT',
            'email' => 'it@theopeneyes.com',
            'password' => bcrypt('12345789'),
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Users::insert([
            'id' => Str::uuid()->toString(),
            'role_id' => $admin,
            'first_name' => 'Admin',
            'email' => 'admin@theopeneyes.com',
            'password' => bcrypt('12345789'),
            'created_by' => '1',
            'updated_by' => '1'
        ]);
        Users::insert([
            'id' => Str::uuid()->toString(),
            'role_id' => $institute_user,
            'first_name' => 'Institute',
            'email' => 'institute@gmail.com',
            'password' => bcrypt('12345789'),
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}