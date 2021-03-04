<?php

namespace Database\Factories;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Issue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $count = 1;
        return [
            'project_id' => mt_rand(1,2),
            'title' => $this->faker->realText(20),
            'description' => $this->faker->realText(),
            'number' => $count++,
            'stage_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,10),
            'status' => $this->faker->randomElement([0, 1, 1])
        ];
    }
}
