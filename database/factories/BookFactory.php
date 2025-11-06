<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3, true),
            'author' => $this->faker->name(),
            'language' => $this->faker->randomElement(['English', 'Spanish', 'French', 'German', 'Italian', 'Portuguese', 'Russian', 'Chinese', 'Japanese', 'Arabic']),
            'publisher' => $this->faker->randomElement(['Penguin Random House', 'HarperCollins', 'Simon & Schuster', 'Macmillan', 'Hachette', 'Pearson', 'Oxford University Press', 'Cambridge University Press', 'Scholastic', 'Wiley']),
            'price' => $this->faker->randomFloat(2, 9.99, 99.99),
            'cover_image' => $this->faker->imageUrl(300, 400, 'books', true),
            'popularity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
