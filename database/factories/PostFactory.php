<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 5),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'path' => $this->random_image(),
            'hidden' => false,
            'created_at' => now(),
        ];
    }

    public function random_image()
    {
        $img_folder = 'img/';

        $rand_img_paths = [
            'asian-river.jpg',
            'australia.jpg',
            'cloudy-mountains.jpg',
            'frosted-peak.jpg',
            'frosty-lake.jpg',
            'mountain-lake.jpg',
            'woods.jpg',
        ];

        $rand_idx = rand(0, 6);

        $rand_img = $rand_img_paths[$rand_idx];

        return $img_folder . $rand_img;
    }
}
