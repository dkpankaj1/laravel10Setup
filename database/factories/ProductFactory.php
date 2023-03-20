<?php

namespace Database\Factories;

use App\Models\SystemSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'code'              =>  Str::random(10),
            'name'              =>  Str::random(10),
            'barcode'           =>  Str::random(10),
            'barcode_type_id'   => random_int(1, 3),
            'description'       =>  fake()->paragraph(),
            'cost'              => random_int(0, 3000),
            'price'             => random_int(0, 3000),
            'order_tex'         => random_int(0, 20),
            'tex_type_id'       =>  random_int(1, 2),
            'discount'          => random_int(0, 20),
            'stock_alert'       => random_int(0, 10),
            'product_unit_id'   => random_int(1, 2),
            'purchase_unit_id'  => random_int(1, 2),
            'sell_unit_id'      => random_int(1, 2),
            'category_id'       => random_int(1, 3),
            'session_id'        =>  SystemSetting::first()->current_app_session
        ];
    }
}
