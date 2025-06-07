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
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'Wedding 1',
                'list_services' => implode('|', [
                    'Decoration Lengkap 6 Meter',
                    'Tenda & Perlengkapan',
                    'Make Up 4 Baju',
                    'Musik Hiburan By Cahaya Musik',
                    'Live Streaming',
                    'MC Akad',
                    'Kirab Pengantin'
                ]),
                'price' => 38000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'BAND AMBYAR LIVE',
                'list_services' => implode('|', [
                    'Sound Systme Line Array 10.000 Watt',
                    'Panggung 8x6 & Cover Sound',
                    'Peralatan Musik FUll Sett',
                    'Lighting Semi Set',
                    'Live Streaming 3 Camera',
                    'Singer 5 & MC Musik 1',
                    'Genset 1 unit'
                ]),
                'price' => 15000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'Wedding 2',
                'list_services' => implode('|', [
                    'Decoration Lengkap 6 Meter',
                    'Tenda & Perlengkapan',
                    'Make Up 4 Baju',
                    'Foto & Vidio',
                    'Musik Hiburan By Cahaya Musik'
                ]),
                'price' => 25000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'ORGAN TUNGGAL 1',
                'list_services' => implode('|', [
                    'Sound Systme Line Array 10.000 Watt',
                    'Panggung 8x6 & Cover Sound',
                    'Lighting Semi Set',
                    'Live Streaming 3 Camera',
                    'Singer 5 & MC Musik 1',
                    'Genset 1 unit'
                ]),
                'price' => 9000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jasa_id' => (string) Str::uuid(),
                'nama_jasa' => 'Wedding 3',
                'list_services' => implode('|', [
                    'Decoration Lengkap 6 Meter',
                    'Tenda & Perlengkapan',
                    'Make Up 3 Baju',
                    'Foto & Vidio'
                ]),
                'price' => 20000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
                [
                    'jasa_id' => (string) Str::uuid(),
                    'nama_jasa' => 'Organ Tunggal 2',
                    'list_services' => implode('|', [
                        'Sound Systme Ground Stage 8.000 Watt',
                        'Panggung 6x6 & Cover Sound',
                        'Peralatan Musik Fullset',
                        'Singer 4',
                        'MC Musik 1'
                ]),
                'price' => 7000000,
                'dp_price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ]  
        ]);
    }
}