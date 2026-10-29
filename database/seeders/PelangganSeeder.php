<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama' => '',
            'alamat' => '',
            'no_hp' => '',
        ]);

        Pelanggan::create([
            'nama' => '',
            'alamat' => '',
            'no_hp' => '',
        ]);
    }
}
