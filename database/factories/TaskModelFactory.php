<?php

namespace Database\Factories;

use App\Models\TaskModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskModelFactory extends Factory
{
    protected $model = TaskModel::class;

    public function definition()
    {
        return [
            
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
        ];
    }
}
