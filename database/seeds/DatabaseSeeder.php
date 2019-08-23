<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        // $this->call(MissionTableSeeder::class);
        factory(App\Models\Mission::class, 20)->create();
        factory(App\Models\Project::class, 20)->create();
        factory(App\Models\News::class, 20)->create();
        factory(App\Models\Event::class, 20)->create();
    }
}
