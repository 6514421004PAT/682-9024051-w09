<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Distributor; 

class DistributorSeeder extends Seeder
{
    public function run(): void
    {
        
        $distributors = [
            ['dtb_name' => 'Disney'],
            ['dtb_name' => 'Fox'],
            ['dtb_name' => 'Universal'],
        ];

        foreach ($distributors as $data) {
            Distributor::create($data);
        }
    }
}