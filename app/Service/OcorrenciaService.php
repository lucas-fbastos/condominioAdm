<?php

namespace App\Service;

use App\Repository\OcorrenciaRepository;
use Illuminate\Support\Facades\Log;
class OcorrenciaService{

    private $repository;
    private $userService;
    private $tipoOcorrenciaService;

    public function __construct(OcorrenciaRepository $ocorrenciaRepository, UserService $userService, TipoOcorrenciaService $tipoOcorrenciaService){
        $this->repository = $ocorrenciaRepository;
        $this->userService = $userService;
        $this->tipoOcorrenciaService = $tipoOcorrenciaService;
    }


    public function create($postData){
        $tipoOcorrencia = $this->tipoOcorrenciaService->getById($postData->tipoOcorrencia);
        $user = $this->userService->getById($postData->user_id);
        if($user==null || $tipoOcorrencia ==null){
          return;
        }    
        try{
            return $this->repository->create($postData);
        }catch(\Exception $e){
            Log::error($e->getMessage());
            throw $e;
        }
    }

    public function filter($filtro){
        return $this->repository->filter($filtro);
    }

    public function getAllPaged(){
        return $this->repository->allPaged(10);
      }
}