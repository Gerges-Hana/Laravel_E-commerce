<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=Product::class;
    public function definition(): array
    {
        return [
            //

            // 'name' => $this->faker->word,
            // 'image' => $this->faker->word.'.jpg',
            // 'category_id' => null,
            // 'price' => $this->faker->word,
            // 'discount_price' => $this->faker->word,
            // 'description' => $this->faker->word,

            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount_price' => $this->faker->randomFloat(2, 5, 50),
            'category_id' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
