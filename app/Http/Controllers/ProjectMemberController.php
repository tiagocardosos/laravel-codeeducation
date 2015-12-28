<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectMemberRepository;
use CodeProject\Services\ProjectMemberService;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    /**
     * @var ProjectMemberRepository
     */
    private $repository;
    /**
     * @var ProjectMemberService
     */
    private $service;

    /**
     * ProjectMemberController constructor.
     * @param ProjectMemberRepository $repository
     * @param ProjectMemberService $service
     */
    public function __construct(ProjectMemberRepository $repository, ProjectMemberService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return $this->repository->with(['project'])->findWhere(['project_id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $memberId
     * @return \Illuminate\Http\Response
     */
    public function show($id, $memberId)
    {

        $projectMember =  $this->repository->findWhere(['project_id'=>$id, 'user_id'=>$memberId])->first();

        if (count($projectMember) == null ) {
            return [
                'error' => true,
                'message' => "Membro {$memberId} não encontrado no Projeto {$id}",
            ];
        }

        return $projectMember;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $memberId
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $memberId)
    {
        $this->repository->delete($memberId);
    }
}
