<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'album_name' => $this->faker->unique()->text(15),
            'album_thumb' => $this->faker->imageUrl(),
            'description' => $this->faker->text(120),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'user_id' => User::factory()
        ];
    }
}
