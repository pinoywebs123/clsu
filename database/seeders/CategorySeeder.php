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
                Sub::create(['category_id'=> $cat->id,'name'=> 'WRITING AND ERASING SUPPLIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'PAPERS AND PLASTIC FILMS']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'DOCUMENT CASE AND HOLDERS']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'TABS, CLIPS AND OTHER ACCESSORIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'FILE BOXES AND TRAYS']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'CUTTING, BINDING AND OTHER SUPPLIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'OFFICE EMERGENCY SUPPLIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'OIL, INK AND INK REFILLS (INK, TONER, CARTRIDGE, ETC.)']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'DIGITAL STORAGE AND ACCESSORIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'SMALL IT ACCESSORIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'IT SOFTWARE']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'AVR PRINTING/SCANNING MACHINE, Battery, Power Supply, etc.']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'CLEANING SUPPLIES AND MATERIALS']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'OFFICE DEVICE AND SMALL APPLIANCES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'HYGIENE, MEDICAL ACCESSORIES AND OTHER SUPPLIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'FLAGs MEDALS AND OTHER ACCESSORIES']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'PRINTED PUBLICATIONS']);
                Sub::create(['category_id'=> $cat->id,'name'=> 'LOAD CARDS AND COMMUNICATION']);

        $cat2 =  Category::create(['name'=> 'CONSTRUCTION SUPPLIES']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'GENERAL CONSTRUCTION SUPPLIES AND MATERIALS']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'TILES SUPPLIES AND OTHER ACCESSORIES']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'WATER WORK SUPPLIES AND OTHER MATERIALS']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'ELECTRICAL SUPPLIES AND MATERIALS']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'PAINT AND PAINTWORK MATERIALS']);
                Sub::create(['category_id'=> $cat2->id,'name'=> 'CONSTRUCTION TOOLS AND OTHER SUPPLIES']);

        $cat3 =  Category::create(['name'=> 'AGRICULTURAL AND AQUATIC SUPPLIES']);
                Sub::create(['category_id'=> $cat3->id,'name'=> 'FARM INPUTS SUPPLIES']);

        $cat4 =  Category::create(['name'=> 'FUEL AND OIL SUPPLY']);
                Sub::create(['category_id'=> $cat4->id,'name'=> 'FUEL AND OIL SUPPLIES']);
        
    }
}
