<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $obats = [
            [
                'kode_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol 500mg',
                'stok' => 100,
                'tanggal_kadaluarsa' => '2027-12-31',
            ],
            [
                'kode_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin 500mg',
                'stok' => 50,
                'tanggal_kadaluarsa' => '2027-06-30',
            ],
            [
                'kode_obat' => 'OBT003',
                'nama_obat' => 'Omeprazole 20mg',
                'stok' => 75,
                'tanggal_kadaluarsa' => '2028-01-15',
            ],
            [
                'kode_obat' => 'OBT004',
                'nama_obat' => 'Loratadine 10mg',
                'stok' => 60,
                'tanggal_kadaluarsa' => '2027-09-30',
            ],
            [
                'kode_obat' => 'OBT005',
                'nama_obat' => 'Cetirizine 10mg',
                'stok' => 80,
                'tanggal_kadaluarsa' => '2027-11-30',
            ],
            [
                'kode_obat' => 'OBT006',
                'nama_obat' => 'Ibuprofen 400mg',
                'stok' => 90,
                'tanggal_kadaluarsa' => '2028-03-31',
            ],
            [
                'kode_obat' => 'OBT007',
                'nama_obat' => 'Salbutamol 2mg',
                'stok' => 40,
                'tanggal_kadaluarsa' => '2027-08-31',
            ],
            [
                'kode_obat' => 'OBT008',
                'nama_obat' => 'Metformin 500mg',
                'stok' => 120,
                'tanggal_kadaluarsa' => '2028-05-31',
            ],
            [
                'kode_obat' => 'OBT009',
                'nama_obat' => 'Amlodipine 5mg',
                'stok' => 110,
                'tanggal_kadaluarsa' => '2028-04-30',
            ],
            [
                'kode_obat' => 'OBT010',
                'nama_obat' => 'Simvastatin 20mg',
                'stok' => 70,
                'tanggal_kadaluarsa' => '2027-10-31',
            ],
        ];

        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
