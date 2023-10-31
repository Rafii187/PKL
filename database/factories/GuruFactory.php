<?php

namespace Database\Factories;

use App\Models\Mapel;
use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guru>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $mapel = Mapel::inRandomOrder()->first();
        $sekolah = Sekolah::inRandomOrder()->first();
        return [
            'mapel_id' => $mapel->mapel_id,
            'sekolah_id' => $sekolah->sekolah_id,
            'user_jab_id' => 2,
            'nama' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'nip' => $this->faker->unique()->numerify('##########'), // Contoh format NIP
            'alamat' => $this->faker->address,
            'status' => $this->faker->randomElement(['Aktif', 'Non Aktif']),
            'no_telpon' => $this->faker->phoneNumber,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
        ];
    }
}
