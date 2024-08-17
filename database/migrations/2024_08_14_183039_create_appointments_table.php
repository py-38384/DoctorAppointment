<?php

use App\Models\Doctor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->integer('appointment_no');
            $table->dateTime('appointment_date');
            $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete();
            $table->string('patient_name');
            $table->string('patient_phone');
            $table->string('total_fee');
            $table->string('paid_amount');
            $table->boolean('check')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
