<?php

namespace Database\Seeders;

use App\Models\StafApotek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StafSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        StafApotek::create([
            'nama' => 'Yanissullah',
            'alamat' => 'Jl. Merdeka No. 10',
            'tanggal_lahir' => '1990-05-12',
            'no_hp' => '081234567890',
        ]);

        StafApotek::create([
            'nama' => 'T.M Qaisar Pallawi',
            'alamat' => 'Jl. Sudirman No. 25',
            'tanggal_lahir' => '1988-08-20',
            'no_hp' => '081234567891',
        ]);
    }
}
