<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conversionsCurrency = [
            [
                'name' => 'US Dollar',
                'code' => 'USD',
            ],
            [
                'name' => 'Malaysian Ringgit',
                'code' => 'MYR',
            ],
            [
                'name' => 'Philippine Peso',
                'code' => 'PHP',
            ],
            [
                'name' => 'Singapore Dollar',
                'code' => 'SGD',
            ],
            [
                'name' => 'Thai Baht',
                'code' => 'THB',
            ]
        ];
        DB::table('currencies')->insert($conversionsCurrency);
    }
}
