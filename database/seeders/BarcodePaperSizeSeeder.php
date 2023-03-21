<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarcodePaperSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'label'     => '40 per sheet (a4) (1.799 * 1.003)',
                'paper'     => 'a4',
                'qnt'       => 40,
                'height'    => 1.003,
                'width'     => 1.799

            ],
            [
                'label'     => '30 per sheet (2.625 * 1)',
                'paper'     => 'non_a4',
                'qnt'       => 30,
                'height'    => 1,
                'width'     => 2.625

            ],
            [
                'label'     => '24 per sheet (a4) (2.48 * 1.334)',
                'paper'     => 'a4',
                'qnt'       => 24,
                'height'    => 1.334,
                'width'     => 2.48

            ],
            [
                'label'     => '20 per sheet (4 * 1)',
                'paper'     => 'non_a4',
                'qnt'       => 20,
                'height'    => 1,
                'width'     => 4

            ],
            [
                'label'     => '18 per sheet (a4) (2.5 * 1.835)',
                'paper'     => 'a4',
                'qnt'       => 18,
                'height'    => 1.835,
                'width'     => 2.5

            ],
            [
                'label'     => '14 per sheet (4 * 1.33)',
                'paper'     => 'non_a4',
                'qnt'       => 14,
                'height'    => 1.33,
                'width'     => 4

            ],
            [
                'label'     => '12 per sheet (a4) (2.5 * 2.834)',
                'paper'     => 'a4',
                'qnt'       => 12,
                'height'    => 2.834,
                'width'     => 2.5

            ],
            [
                'label'     => '10 per sheet (4 *2)',
                'paper'     => 'non_a4',
                'qnt'       => 10,
                'height'    => 2,
                'width'     => 4

            ],
        ];

        DB::table('barcode_paper_sizes')->insert($data);
    }
}
