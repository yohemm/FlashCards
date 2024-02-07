<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::select('id')->where('id' ,'>' ,0)->get();
        $question = fake()->sentence(1);
        return [
            'question' => $question."?",
            'slug' =>\Str::slug($question),
            'answer' => fake()->sentence(1),
            'explication' => fake()->paragraph(1),
            'owner_id' => $users->random()->id
        ];
    }
}
