<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    private static $appointment_no = 1;
    private static function getpaid($doctor, $current){
        $paid = 1000000000000;
        while($paid > $doctor->fee) {
            $paid = $current->faker->randomElement([2000,5000,8000,10000,18000]);
        }
        return $paid;
    }
    public function definition()
    {
        $doctor = $this->faker->randomElement(Doctor::all());
        $paid = $this::getpaid($doctor, $this);
        return [
            "appointment_no" => $this::$appointment_no++,
            "appointment_date" => $this->faker->dateTimeBetween('-1 week', '+1 month'),
            "doctor_id"=> $doctor,
            "patient_name"=> $this->faker->name(),
            "patient_phone"=> $this->faker->phoneNumber(),
            "total_fee"=> $doctor->fee,
            "paid_amount" => $paid,
        ];
    }
}
