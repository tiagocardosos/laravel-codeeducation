<?php

use CodeProject\Entities\ProjectMember;
use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Project::truncate();

        factory(ProjectMember::class, 30)->create();
    }
}
