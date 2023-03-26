<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Sub;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat =  Category::create(['name'=> 'OFFICE SUPPLIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'WRITING AND ERASING SUPPLIES'])
        
    }
}
