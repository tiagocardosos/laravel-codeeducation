<?php

use CodeProject\Entities\Client;
use CodeProject\Entities\Project;
use CodeProject\Entities\ProjectNote;
use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project::truncate();

        factory(ProjectNote::class, 30)->create();
    }
}
