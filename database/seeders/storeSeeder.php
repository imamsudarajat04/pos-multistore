<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Stores;

class storeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stores::create([
            'id'               => (string) Str::uuid(),
            'name'             => 'Toko Pertama Delia',
            'code'             => 'TPD',
            'email'            => 'tokopertama@gmail.com',
            'phonenumber'      => '08123456789',
            'addressone'       => 'Jl. Raya Ciputat Parung',
            'addresstwo'       => 'Kp. Ciputat RT 01 RW 02',
            'postalcode'       => '15412',
            'city'             => 'Tangerang',
            'province'         => 'Banten',
            'country'          => 'Indonesia',
            'logo'             => 'logo.png',
            'receiptheader'    => 'Toko Pertama Delia',
            'receiptfootnotes' => 'Terima kasih atas kunjungan Anda'
        ]);
    }
}
