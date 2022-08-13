<?php
namespace App\Repository;

use App\Ocorrencia;

class OcorrenciaRepository extends GenericRepository{
    
    public function __construct()
	{
        $this->model = new Ocorrencia();
        parent::__construct($this->model);
	}

    /**
     * @param UnsignedBigInt
     *
     */
    public function getById($id)
    {
        $user = $this->model::find($id);
        return $user;
    }

    public function create($data)
    {
      $ocorrencia = new ocorrencia();
      $ocorrencia->tipo_ocorrencias_id = $data->tipoOcorrencia;
      $ocorrencia->users_id = $data->user_id;
      $ocorrencia->data_ocorrencia= $data->dataOcorrencia;
      $ocorrencia->descricao = $data->descricao;
      return $ocorrencia->save();
    }

    public function update($data,$dataAtt)
    {
      $data->tipo_ocorrencias_id = $dataAtt->tipoOcorrencia;
      $data->users_id = $dataAtt->user_id;
      $data->data_ocorrencia= $dataAtt->dataOcorrencia;
      $data->descricao = $dataAtt->descricao;
      return $data->save();
    }

    public function filter($filter){
        $pages = $this->model::where('tipo_ocorrencias_id',$filter->tipoOcorrencia)->orderBy('data_ocorrencia','desc')->get();
        return $pages;
    }

      /**
     * @param int
     *
     */
    public function allPaged($pageSize = 5){
        $pages = $this->model::orderBy('data_ocorrencia','desc')->paginate($pageSize);
        return $pages;
    }
    
}