<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 29/12/15
 * Time: 11:18
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['members', 'client'];

    /**
     * @param Project $project
     * @return array
     */
    public function transform(Project $project)
    {
        return [
            'project_id' => $project->id,
            'owner' => $project->owner_id,
            'client_id' => $project->client_id,
            'project' => $project->name,
            'description' => $project->description,
            'progress' => $project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date
        ];
    }

    public function includeMembers(Project $project)
    {

        return $this->collection($project->members, new ProjectMemberTransformer());
    }

    public function includeClient(Project $project)
    {

        return $this->item($project->client, new ProjectClientTransformer());

    }
}