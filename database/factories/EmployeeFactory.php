<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=>$this->faker->name,
            'last_name'=>$this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'job_title_id' => rand(1, 5),
            'department_id' => rand(1, 5),
            'salary' => $this->faker->numberBetween($min = 10000, $max = 100000),
          
            //
        ];
    }
}
