<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class JasaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jasa')->insert([
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'DANGDUT FULL LIVE',
                'list_services' => implode('|', [
                    'Sound Systme Line Array 20.000 watt',
                    'Panggung 8x6 & Cover Sound',
                    'Peralatan Musik Full Set',
                    'Lighting Full Set',
                    'Live Streaming 4 Camera',
                    'Singer 6 & MC Musik 1',
                    'Genset 2 unit'
                ]),
                'price' => 30000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'BAND AMBYAR LIVE',
                'list_services' => implode('|', [
                    'Sound Systme Line Array 10.00 Watt',
                    'Panggung 8x6 & Cover Sound',
                    'Peralatan Musik FUll Sett',
                    'Lighting Semi Set',
                    'Live Streaming 3 Camera',
                    'Singer 5 & MC Musik 1',
                    'Genset 1 unit'
                ]),
                'price' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'ORGAN TUNGGAL 1',
                'list_services' => implode('|', [
                    'Sound Systme Line Array 10.00 Watt',
                    'Panggung 8x6 & Cover Sound',
                    'Lighting Semi Set',
                    'Live Streaming 3 Camera',
                    'Singer 5 & MC Musik 1',
                    'Genset 1 unit'
                ]),
                'price' => 9000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'WATERFALL',
                'list_services' => implode('|', [
                    'Sound Systme Ground Stage',
                    'Panggung 6x6 & Cover Sound',
                    'Lighting Semi Set',
                    'Singer 4 & MC Musik 1'
                ]),
                'price' => 7000000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
