<?php

namespace Database\Factories;

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
    public function definition()
    {
        // $imageArray = [
        //     '1656746019-Nike-Airforce-1-New-Collection-2019-png',
        //     '1656748812-teatea-png',
        //     '1656748297-Airforce-1-New-Collection-2021-png'
        // ];

        $imageArray = [
            '20mgNerdBarWhitePeachRazz_2048x2048.jpg',
            '20mgNerdBarSourAppleIce_2048x2048.jpg',
            '20mgNerdBarPinkLemonade_2048x2048.jpg',
            '20mgNerdBarPeachMango_2048x2048.jpg'
        ];

        $randomNames = [
            "Harry", "Ross",
            "Bruce", "Cook",
            "Carolyn", "Morgan",
            "Albert", "Walker",
            "Randy", "Reed",
            "Larry", "Barnes",
            "Lois", "Wilson",
            "Jesse", "Campbell",
            "Ernest", "Rogers",
            "Theresa", "Patterson",
            "Henry", "Simmons",
            "Michelle", "Perry",
            "Frank", "Butler",
            "Shirley",
        ];

        $randomColors = [
            'red', 'orange', 'yellow', 'blue', 'green', 'indigo', 'pink',
        ];

        return [
            'name' => 'Disposable Vape ' . $randomNames[rand(0, count($randomNames) - 1)],
            'urltag' => $randomNames[rand(0, count($randomNames) - 1)],
            'category' => 'disposable vape',
            'subtitle' => 'lorem da lorem',
            'description' => '<b>Specifications</b>:<br />
                20mg Nicotine Salt (2%) E-Liquid <br />
                Capacity: 2.0ml <br />
                Puffs: Up to 650 <br />
                Nicotine Per Puff: 66mcg <br />
                Battery: 550mAh',
            'color' => $randomColors[rand(0, count($randomColors) - 1)],
            'size' => rand(30, 44),
            'price' => rand(50, 2000),
            'stock_price' => rand(120, 250),
            'subtag1' => 'new',
            'subtag2' => 'faschioned',
            'active' => 1,
            'quantity' => 0,
            'onsale' => false,
            'added_by' => 1,
            'image_path' => $imageArray[rand(0, 2)],
        ];







        // return [
        //     'name' => $randomNames[rand(0, count($randomNames) - 1)],
        //     'category' => $this->faker->name,
        //     'subtitle' => 'lorem da lorem',
        //     'description' => 'lorem da da',
        //     'color' => $this->faker->colorName(),
        //     'size' => $this->faker->numberBetween(12, 50),
        //     'price' => $this->faker->numberBetween(5, 250),
        //     'stock_price' => $this->faker->numberBetween(20, 40),
        //     'subtag1' => $this->faker->name(),
        //     'subtag2' => $this->faker->name(),
        //     'active' => 1,
        //     'quantity' => 0,
        //     'onsale' => false,
        //     'added_by' => 1,
        //     'image_path' => $imageArray[rand(0, 2)],
        // ];
    }
}
