<?php

namespace Database\Seeders;

use App\Models\ProdukUMKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdukUMKM::create([
            'name' => 'Kopi',
            'price' => 5000,
            'stock' => '',
            'selling' => '',
            'userumkm_id' => '',
            'category_id' => '',
        ]);
    }
}
