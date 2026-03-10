<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $tags = [
            'แหล่งท่องเที่ยว',
            'อาหารพื้นเมือง',
            'วัฒนธรรม',
            'เกษตรกรรม',
            'ที่พัก/โฮมสเตย์',
        ];

        foreach ($tags as $tagName) {
           
            Tag::firstOrCreate([
                'tag_name' => $tagName
            ]);
        }
    }
}