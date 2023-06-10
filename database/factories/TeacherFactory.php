<?php

namespace Database\Factories;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = User::where('school', '646dd6d0511b7e8166014913')
        ->where('role', 'teacher')
        ->get()->toArray();

        $user = Arr::random($users);

        $validate = Teacher::where('nic', $user["index"])
        ->where('school', $user["school"])
        ->first();

        if($validate != null) {
            return $this->definition();
        }
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'full_name' => $user["name"],
            'date_of_birth' => $this->faker->date(),
            'nic' => $user["index"],
            'appointed_subject' => $this->faker->randomElement(['Mathematics', 'Science', 'English', 'Sinhala', 'Tamil', 'History', 'Geography', 'Civics', 'Health', 'Religion', 'Art', 'Music', 'Dancing', 'Drama', 'ICT', 'Commerce', 'Business Studies', 'Accounting', 'Economics', 'Agriculture', 'Home Science', 'Technology', 'English Literature', 'French', 'German', 'Japanese', 'Chinese', 'Russian', 'Hindi', 'Arabic', 'Pali', 'Buddhism', 'Islam', 'Hinduism', 'Catholicism', 'Christianity']),
            'gender' => $this->faker->randomElement(['Male', 'Female'])[0],
            'nationality' => $this->faker->randomElement(['Sinhalese', 'Tamil', 'Muslim', 'Burgher', 'Malay', 'Other']),
            'religion' => $this->faker->randomElement(['Buddhism', 'Islam', 'Hinduism', 'Catholicism', 'Christianity', 'Other']),
            'qualifications' => $this->faker->randomElement(['Diploma', 'Degree', 'Masters', 'PhD', 'Other']),
            'mobile' => '077' . $this->faker->numberBetween(1000000, 9999999),
            'email' => $user["email"],
            'address' => $this->faker->address(),
            'school' => $user["school"],
            'subjects' => [
                [
                    'subject' => $this->faker->randomElement([
                        "Bucket_1",
                        "Bucket_2",
                        "Bucket_3",
                        "General_English"
                    ]),
                    'grade' => $this->faker->randomElement([
                        "12",
                        "13",
                    ]),
                ],
                [
                    'subject' => $this->faker->randomElement([
                        "Bucket_1",
                        "Bucket_2",
                        "Bucket_3",
                        "General_English"
                    ]),
                    'grade' => $this->faker->randomElement([
                        "12",
                        "13",
                    ]),
                ]
            ]
        ];
    }
}
