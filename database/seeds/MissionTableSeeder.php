<?php

use App\Models\Mission;
use Illuminate\Database\Seeder;

class MissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::insert([
            [
                'name'=>'title 1',
                'description'=>'this is description 1',
            ],
            [
                'name'=>'title 2',
                'description'=>'this is description 2',
            ],
            [
                'name'=>'title 3',
                'description'=>'this is description 3',
            ],
        ]);
    }
}
