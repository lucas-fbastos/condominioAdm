<?php

namespace App\Service;
use App\Repository\TipoOcorrenciaRepository;

class TipoOcorrenciaService{

    private $repository;

    public function __construct(TipoOcorrenciaRepository $ocorrenciaRepository){
        $this->repository = $ocorrenciaRepository;
    }

    public function getAll(){
        return $this->repository->getList();
    }

    public function getById($id){
        return $this->repository->getById($id);
    }

    


}