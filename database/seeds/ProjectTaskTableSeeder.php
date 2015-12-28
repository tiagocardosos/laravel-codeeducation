<?php

use CodeProject\Entities\Client;
use CodeProject\Entities\Project;
use CodeProject\Entities\ProjectNote;
use CodeProject\Entities\ProjectTask;
use Illuminate\Database\Seeder;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project::truncate();

        factory(ProjectTask::class, 30)->create();
    }
}
