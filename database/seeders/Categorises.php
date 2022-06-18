<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;

class Categorises extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        category::create([
            'name' => 'screens'
            
        ]);
    //     conditioners
    //     mixers
    //     washing machines
    //     refrigerators
    }
}
