<?php

use CodeProject\Entities\Client;
use CodeProject\Entities\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project::truncate();

        factory(Project::class, 20)->create();
    }
}
