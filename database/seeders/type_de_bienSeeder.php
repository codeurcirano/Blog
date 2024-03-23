<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class type_de_bienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['appartement', 'maison', 'terrain'];

        foreach ($types as $type) {
            TypeDeBien::create(['nom' => $type]);
        }
    }
}
