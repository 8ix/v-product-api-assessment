<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected static $productTypes = ['Laptop', 'Smartphone', 'Tablet', 'Headphones', 'Monitor', 'Keyboard', 'Mouse', 'Printer', 'Camera', 'Speaker','Watch','Modem','AirPurifier', 'Router', 'Projector', 'Scanner', 'Smartwatch', 'Fitness Tracker'];
    protected static $brand = ['TechPro', 'ElectroMax', 'GadgetZone', 'SmartTech', 'InnoWare', 'FutureTech', 'NextGen', 'PrimeTech', 'EliteGear', 'TechNova', 'TechPlus', 'TechPro', 'TechMax', 'TechUltra', 'TechLite', 'TechBasic'];
    protected static $type = ['Pro', 'Lite', 'Max', 'Ultra', 'Basic', 'Super', 'Plus', 'Turbo', 'Extreme', 'Elite', 'Prime', 'Ultra', 'UltraMax', 'UltraPro', 'UltraLite', 'UltraBasic'];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->generateProductName(),
            'description' => $this->faker->paragraph,
            'code' => $this->faker->unique()->bothify('PROD-####??'),
            'internal_notes' => $this->faker->optional()->paragraph,
        ];
    }

    private function generateProductName(): string
    {
        $productType = $this->faker->randomElement(self::$productTypes);
        $brand = $this->faker->randomElement(self::$brand);
        $type = $this->faker->randomElement(self::$type);

        return "{$brand} {$productType} {$type}";
    }
}
