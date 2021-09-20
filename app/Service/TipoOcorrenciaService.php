<?php

namespace App\Service;
use App\Repository\TipoOcorrenciaRepository;
use App\TipoOcorrencia;

class TipoOcorrenciaService{

    private $repository;
    private $defaultIcon = "fas fa-comment";

    public function __construct(TipoOcorrenciaRepository $ocorrenciaRepository){
        $this->repository = $ocorrenciaRepository;
    }

    public function getAll(){
        return $this->repository->getList();
    }

    public function getById($id){
        return $this->repository->getById($id);
    }

    public function crate($tipoOcorrencia){     
        $tipoOcorrencia = new TipoOcorrencia();
        $tipoOcorrencia->descricao_tipo = $tipoOcorrencia->descricao_tipo;
        $tipoOcorrencia->icon = ($tipoOcorrencia->icon!=null) ? $tipoOcorrencia->icon : $defaultIcon;
        return $tipoOcorrencia->save();
    }

    public function delete($id){
        $tipoOcorrencia = getById($id);
        if($tipoOcorrencia!=null){
            $tipoOcorrencia->delete();
            return true;
        }
        return false;
    }


}