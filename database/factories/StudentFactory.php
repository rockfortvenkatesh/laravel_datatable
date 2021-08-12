<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'name' => $this->faker->name(),
            'roll_no' => $this->faker->unique(true)->numberBetween(2, 10000),
            'maths' => $this->faker->numberBetween(35, 99),
            'physics' => $this->faker->numberBetween(35, 99),
            'chemistery' => $this->faker->numberBetween(35, 99),
            'computer_science' => $this->faker->numberBetween(35, 99),
            'biology' => $this->faker->numberBetween(35, 99),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null)
        ];
    }
}
