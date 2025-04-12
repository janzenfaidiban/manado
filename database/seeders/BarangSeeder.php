<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $barang = [
            ['nama_barang' => 'Paracetamol', 'kategori' => 'obat', 'harga_satuan' => 1000, 'keterangan' => 'Pereda nyeri dan demam'],
            ['nama_barang' => 'Amoxicillin', 'kategori' => 'obat', 'harga_satuan' => 2500, 'keterangan' => 'Antibiotik'],
        ];
        

        foreach ($barang as $item) {
            Barang::create($item);
        }
    }
}