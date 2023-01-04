<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dummy_image = [
            'https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/f636e851a7a04a6bb3478db2bc1920c8.jpg',
            'https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/9a4c4c4f9f0264ac5105755c4e106d11.jpg',
            'https://images.glints.com/unsafe/60x0/glints-dashboard.s3.amazonaws.com/company-logo/4586318b301a0c2c4722904d41b43c2c.png',
            'https://images.glints.com/unsafe/glints-dashboard.s3.amazonaws.com/company-logo/8bf6b97e304da164ecb51244671e339d.png',
            'https://images.glints.com/unsafe/60x0/glints-dashboard.s3.amazonaws.com/company-logo/b4516ab8738c427e353b88f41ccfb4f3.jpg',
            'https://images.glints.com/unsafe/60x0/glints-dashboard.s3.amazonaws.com/company-logo/3720897d3a65fdcc9129945bd2973289.png'
        ];

        $industries = ["Retail","Transportation", "Furniture","Information and Technology", "Food and Beverages", "Civic & Social Organization", "Cosmetics"];

        $address = ["Jakarta Barat","Bandung", "Malang","Bekasi", "Semarang", "Alam Sutera"];

        return [
            'name' => $this->faker->company(),
            'size' => 100,
            'description' => $this->faker->text(300),
            'address'=> $this->faker->randomElement($address),
            'industry'=> $this->faker->randomElement($industries),
            'image'=> $this->faker->randomElement($dummy_image)
        ];
    }
}
