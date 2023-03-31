<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            'abstract',
            'animal',
            'business',
            'cats',
            'city',
            'food',
            'nightlife',
            'fashion',
            'people',
            'nature',
            'sports',
            'music',
            'transport',
            'technics',
            'web development'
        ];

        foreach($cats as $cat){
            Category::create([
                'category_name' => $cat,
            ]);
        }
    }
}
