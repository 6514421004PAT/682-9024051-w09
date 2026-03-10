<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie; 

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        
        $movies = [
            [
                'mov_name_th' => 'Avenger', 
                'mov_year' => 2012, 
                'mov_budget' => 100, 
                'mov_income' => 200, 
                'mov_dtc_id' => 1
            ],
            [
                'mov_name_th' => 'Avenger Infinity War', 
                'mov_year' => 2018, 
                'mov_budget' => 150, 
                'mov_income' => 400, 
                'mov_dtc_id' => 1
            ],
            [
                'mov_name_th' => 'Avenger Endgame', 
                'mov_year' => 2019, 
                'mov_budget' => 200, 
                'mov_income' => 800, 
                'mov_dtc_id' => 1
            ],
        ];

        foreach ($movies as $data) {
            Movie::create($data);
        }
    }
}