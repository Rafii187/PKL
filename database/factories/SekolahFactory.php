<?php

namespace Database\Factories;

use Faker\Provider\id_ID\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sekolah>
 */
class SekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Address($this->faker));
        $sekolahs = [
            'SMP Negeri 1',
            'SMP Negeri 2',
            'SMP Negeri 3',
            'SMA Negeri 4',
            'SMA Negeri 5',
            'SMA Negeri 6',
            'SMA Negeri 7',
            'SMA Negeri 8',
            'SMA Negeri 9',
            'SMA Negeri 10',
            // Tambahkan nama sekolah lain sesuai kebutuhan
        ];
        return [
            'nama_sekolah' => $this->faker->unique()->randomElement($sekolahs),
            'alamat' => $this->faker->address,
        ];
    }
}
