<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $departmentList = [
            "Neurologists",
            "Cardiology",
            "Dermatologist",
            "Gastroenterologist",
            "General surgery",
            "Oncologist",
            "Endocrinologist",
            "Hematology",
            "Ophthalmology",
            "Paediatrics",
            "ENT",
            "Internal medicine",
            "Nephrologist",
            "Anaesthesia",
            "Infectious Disease Specialist",
            "Liver specialist",
            "Radiologist",
            "Urologist",
            "Allergist",
            "Cardiac surgery",
            "Emergency medicine",
            "Geriatric Medicine specialists",
            "Pulmonology",
            "Osteopath",
        ];
        foreach ($departmentList as $department) {
            Department::create(["name" => $department]);
        }
        Doctor::factory(10)->create();
        Appointment::factory(100)->create();
    }
}
