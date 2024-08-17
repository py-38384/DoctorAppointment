<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departmentObjArr = Department::all();
        return [
            "department_id" => $departmentObjArr->random(1)[0],
            "name" => $this->faker->name,
            "phone" => $this->faker->phoneNumber,
            "fee" => $this->faker->randomElement(["5000","7000","10000","12000","20000"]),
        ];
    }
}
