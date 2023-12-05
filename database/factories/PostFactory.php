<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Какой-то заголовок',
            'content' => 'Супер интересный контент',
            'image' => $this->faker->city,
            'likes' => random_int(1, 111),
            'category_id' => Category::get()->random()->id
        ];
    }
}
