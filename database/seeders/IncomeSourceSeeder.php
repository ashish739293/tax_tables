<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncomeSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncomeSource::insert([
            [
                'title' => 'Income From Salary or House Property or Other Source or All Three',
                'fees' => '400'
            ],
            [
                'title' => 'Income from salary with capital gain',
                'fees' => '700'
            ],
            [
                'title' => 'Income From Business & Profession or Other Sources Income or Both',
                'fees' => '600'
            ]
        ]);
    }
}
