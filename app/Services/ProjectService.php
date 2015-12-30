<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 10/12/15
 * Time: 15:14
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ClientValidator;
use CodeProject\Validators\ProjectValidator;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjeRepository
     */

    protected $repository;
    /**
     * @var ClientValidator
     */
    private $validator;
    /**
     * @var Filesystem
     */
    private $fileSystem;
    /**
     * @var Storage
     */
    private $storage;


    /**
     * ProjectService constructor.
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     * @param Filesystem $fileSystem
     * @param Storage $storage
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator,
                                Filesystem $fileSystem, Storage $storage){
        $this->repository = $repository;
        $this->validator = $validator;
        $this->fileSystem = $fileSystem;
        $this->storage = $storage;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data){
        // enviar um email
        // disparar notificacao
        // postar um twett
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }

    }

    /**
     * @param array $data
     * @return mixed
     */
    public function update(array $data, $id){

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }

    }

    public function createFile(array $data){
        // name, description, extension, file

        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($data['name'].".".$data['extension'], $this->fileSystem->get($data['file']));
    }

}