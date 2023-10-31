<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mapel>
 */
class MapelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mapels = [
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Biologi',
            'Pancasila',
            'Sejarah',
            'IPS',
            'IPA',
            // Tambahkan mata pelajaran lain sesuai dengan kurikulum Indonesia
        ];
        return [
            'nama_mapel' => $this->faker->unique()->randomElement($mapels),
        ];
    }
}
