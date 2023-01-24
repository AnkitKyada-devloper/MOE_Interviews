<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Configurations;

class ConfigurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $it_id = Users::where('email', 'it@theopeneyes.com')->first()->id;
        $data = [
            ['conf_key' => "user_gender", 'conf_value' => 1, 'display_text' => 'Male', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "user_gender", 'conf_value' => 2, 'display_text' => 'Female', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "user_gender", 'conf_value' => 3, 'display_text' => 'Prefer not to disclose', 'created_by' => $it_id, 'updated_by' => $it_id],
            
            ['conf_key' => "institute_user_role", 'conf_value' => 1, 'display_text' => 'Admin', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "institute_user_role", 'conf_value' => 2, 'display_text' => 'Candidate', 'created_by' => $it_id, 'updated_by' => $it_id],
            
            ['conf_key' => "institute_user_status", 'conf_value' => 1, 'display_text' => 'Pending/Invited', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "institute_user_status", 'conf_value' => 2, 'display_text' => 'Registered', 'created_by' => $it_id, 'updated_by' => $it_id],

            ['conf_key' => "candidate_experience", 'conf_value' => 1, 'display_text' => 'Fresher', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_experience", 'conf_value' => 2, 'display_text' => '1+ years', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_experience", 'conf_value' => 3, 'display_text' => '1-3 years', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_experience", 'conf_value' => 4, 'display_text' => '3+ years', 'created_by' => $it_id, 'updated_by' => $it_id],

            ['conf_key' => "candidate_qualification", 'conf_value' => 1, 'display_text' => 'BE/Btech', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_qualification", 'conf_value' => 2, 'display_text' => 'ME/Mtech', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_qualification", 'conf_value' => 3, 'display_text' => 'BCA/BSc IT', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_qualification", 'conf_value' => 4, 'display_text' => 'MCA/MSc IT', 'created_by' => $it_id, 'updated_by' => $it_id],

            ['conf_key' => "question_type", 'conf_value' => 1, 'display_text' => 'MCQ', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "question_type", 'conf_value' => 2, 'display_text' => 'Short Answer', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "question_type", 'conf_value' => 3, 'display_text' => 'Descriptive', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "question_type", 'conf_value' => 4, 'display_text' => 'File Upload', 'created_by' => $it_id, 'updated_by' => $it_id],

            ['conf_key' => "question_text_language", 'conf_value' => 1, 'display_text' => 'English', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "question_text_language", 'conf_value' => 2, 'display_text' => 'Hindi', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "question_text_language", 'conf_value' => 3, 'display_text' => 'Gujarati', 'created_by' => $it_id, 'updated_by' => $it_id],
          
            ['conf_key' => "employement_type", 'conf_value' => 1, 'display_text' => 'Internship', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "employement_type", 'conf_value' => 2, 'display_text' => 'Full-Time', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "employement_type", 'conf_value' => 3, 'display_text' => 'Part-Time', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "employement_type", 'conf_value' => 4, 'display_text' => 'Contract', 'created_by' => $it_id, 'updated_by' => $it_id],

            ['conf_key' => "job_location", 'conf_value' => 1, 'display_text' => 'Vadodara, India', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "job_location", 'conf_value' => 2, 'display_text' => 'Ahmedabad, India', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "job_location", 'conf_value' => 3, 'display_text' => 'Washington DC, USA', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "job_location", 'conf_value' => 4, 'display_text' => 'Remote', 'created_by' => $it_id, 'updated_by' => $it_id],

                 
            ['conf_key' => "candidate_reference", 'conf_value' => 1, 'display_text' => 'College/University', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_reference", 'conf_value' => 2, 'display_text' => 'Website', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_reference", 'conf_value' => 3, 'display_text' => 'LinkedIn', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_reference", 'conf_value' => 4, 'display_text' => 'Naukri.com', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_reference", 'conf_value' => 5, 'display_text' => 'Friend', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "candidate_reference", 'conf_value' => 6, 'display_text' => 'Other', 'created_by' => $it_id, 'updated_by' => $it_id],
            
            ['conf_key' => "interview_status", 'conf_value' => 1, 'display_text' => 'Not Started', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "interview_status", 'conf_value' => 2, 'display_text' => 'In Progress', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "interview_status", 'conf_value' => 3, 'display_text' => 'Completed', 'created_by' => $it_id, 'updated_by' => $it_id],
            
            ['conf_key' => "interview_result_status", 'conf_value' => 1, 'display_text' => 'Pending', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "interview_result_status", 'conf_value' => 2, 'display_text' => 'In Review', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "interview_result_status", 'conf_value' => 3, 'display_text' => 'Passed', 'created_by' => $it_id, 'updated_by' => $it_id],
            ['conf_key' => "interview_result_status", 'conf_value' => 4, 'display_text' => 'Failed', 'created_by' => $it_id, 'updated_by' => $it_id],

        ];
        Configurations::insert($data);
    }
}
