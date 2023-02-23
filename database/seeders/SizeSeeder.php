<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $size = new Size();
        $size->type = "XS";
        $size->save();

        $size = new Size();
        $size->type = "S";
        $size->save();


        $size = new Size();
        $size->type = "M";
        $size->save();

        $size = new Size();
        $size->type = "L";
        $size->save();

        $size = new Size();
        $size->type = "XL";
        $size->save();
    }
}
