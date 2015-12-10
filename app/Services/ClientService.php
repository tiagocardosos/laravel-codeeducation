<?php
/**
 * Created by PhpStorm.
 * User: tiagocardoso
 * Date: 10/12/15
 * Time: 15:14
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */

    protected $repository;

    /**
     * @var ClientValidator
     */
    private $validator;


    /**
     * ClientService constructor.
     * @param ClientRepository $repository
     * @param ClientValidator $validator
     */
    public function __construct(ClientRepository $repository, ClientValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
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
    public function update(array $data){

        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data);

        }catch (ValidationException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }

    }

}