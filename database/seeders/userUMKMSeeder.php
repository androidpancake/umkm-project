<?php

namespace Database\Seeders;

use App\Models\UserUMKM;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userUMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserUMKM::create(
            //[
            //     'name' => 'UMKM1',
            //     'namaumkm' => 'UMKM Jaya',
            //     'alamat' => 'Jl.ddd',
            //     'bidangusaha' => 'Bangunan',
            //     'email' => 'umkm2@gmail.com',
            //     'password' => Hash::make('umkm123')
            // ],
            [
                'name' => 'Ilham M',
                'namaumkm' => 'Warung Kopi 2',
                'alamat' => 'Jl.abc',
                'bidangusaha' => 'Warung',
                'email' => 'warung22@gmail.com',
                'password' => Hash::make('warung123')   
            ]   
        );
    }
}
