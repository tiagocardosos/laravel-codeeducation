<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectNoteService;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository|ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectNoteService|ProjectService
     */
    private $service;


    /**
     * ProjectNoteController constructor.
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteService $service
     */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
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
        return $this->repository->findWhere(['project_id'=>$id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $noteId)
    {
        return $this->repository->findWhere(['project_id'=>$id, 'id'=>$noteId]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $noteId)
    {
        $this->repository->delete($noteId);
    }
}
