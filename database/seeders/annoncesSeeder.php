<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class annoncesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
  
        {
            Annonces::factory(50)->create();
        }
    
}
