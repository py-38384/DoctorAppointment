<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
