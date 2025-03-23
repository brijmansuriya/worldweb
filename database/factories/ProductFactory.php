<?php
namespace Database\Factories;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Attach multiple random categories
            $categories = Categories::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);
        });
    }
}
