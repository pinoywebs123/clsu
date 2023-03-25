<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create(['name'=> 'box']);
        Unit::create(['name'=> 'piece']);
        Unit::create(['name'=> 'set']);
        Unit::create(['name'=> 'pack']);
        Unit::create(['name'=> 'roll']);
        Unit::create(['name'=> 'gram']);
        Unit::create(['name'=> 'spool']);
        Unit::create(['name'=> 'kilogram']);
        Unit::create(['name'=> 'bag']);
        Unit::create(['name'=> 'bot']);
        Unit::create(['name'=> 'truck load']);
        Unit::create(['name'=> 'bundle']);
        Unit::create(['name'=> 'ream']);
        Unit::create(['name'=> 'pad']);
        Unit::create(['name'=> 'book']);
        Unit::create(['name'=> 'pair']);
        Unit::create(['name'=> 'kit']);
        Unit::create(['name'=> 'sheet']);
        Unit::create(['name'=> 'liter']);
        Unit::create(['name'=> 'meter']);
        Unit::create(['name'=> 'pail']);
        Unit::create(['name'=> 'can']);
        Unit::create(['name'=> 'unit']);
        Unit::create(['name'=> 'tube']);
        Unit::create(['name'=> 'bottle']);
        Unit::create(['name'=> 'jar']);
        Unit::create(['name'=> 'cartridge']);
        Unit::create(['name'=> 'gallon']);
        Unit::create(['name'=> 'feet']);
        Unit::create(['name'=> 'tin']);
    }
}
