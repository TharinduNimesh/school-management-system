<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::take(1)->skip(rand(0, 55))->first();
        $student = Student::where('index_number', $user->index)
        ->where('school', $user->school)
        ->first();
        if($student != null) {
            return [];
        }
        return [
            "full_name" => $this->faker->name(),
            "initial_name" => $user->name,
            "date_of_birth" => $this->faker->date(),
            "index_number" => $user->index,
            "enroll_year" => $this->faker->year(),
            'enroll_class' => $this->faker->randomDigit(),
            'distance' => $this->faker->randomDigit(),
            'previous_school' => null,
            'gender' => $this->faker->randomElements(['male', 'female'])[0],
            'nationality' => $this->faker->randomElements(['Sinhalese', 'Hindu', 'Burger', 'Christian', 'Muslim', 'Tamil'])[0],
            'religion' => $this->faker->randomElements(['Buddhist', 'Hindu', 'Christian', 'Muslim'])[0],
            'travel_method' => $this->faker->randomElements(['Bus', 'Train', 'Car', 'Van', 'Motorbike', 'Bicycle'])[0],
            'scholarship' => $this->faker->randomElements(['Yes', 'No'])[0],
            'mother_name' => $this->faker->name(),
            'mother_nic' => $this->faker->numberBetween(700000000, 999999999) . 'V',
            'mother_mobile' => '07' . $this->faker->numberBetween(10000000, 99999999),
            'mother_job' => $this->faker->randomElements(['Housewife', 'Teacher', 'Doctor', 'Engineer', 'Lawyer', 'Accountant', 'Nurse'])[0],
            'mother_job_address' => $this->faker->address(),
            'mother_email' => $this->faker->safeEmail(),
            'father_name' => $this->faker->name(),
            'father_nic' => $this->faker->numberBetween(700000000, 999999999) . 'V',
            'father_mobile' => '07' . $this->faker->numberBetween(10000000, 99999999),
            'father_job' => $this->faker->randomElements(['Housewife', 'Teacher', 'Doctor', 'Engineer', 'Lawyer', 'Accountant', 'Nurse'])[0],
            'father_job_address' => $this->faker->address(),
            'father_email' => $this->faker->safeEmail(),
            'guardian_name' => $this->faker->name(),
            'guardian_nic' => $this->faker->numberBetween(700000000, 999999999) . 'V',
            'guardian_mobile' => '07' . $this->faker->numberBetween(10000000, 99999999),
            'guardian_job' => $this->faker->randomElements(['Housewife', 'Teacher', 'Doctor', 'Engineer', 'Lawyer', 'Accountant', 'Nurse'])[0],
            'guardian_job_address' => $this->faker->address(),
            'guardian_email' => $this->faker->safeEmail(),
            'emergency_number' => '07' . $this->faker->numberBetween(10000000, 99999999),
            'emergency_email' => $user->email,
            'discipline_marks' => 100,
            'address' => $this->faker->address(),
            'school' => $user->school,
        ];
    }
}