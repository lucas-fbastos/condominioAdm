<?php
namespace App\Repository;

use App\TipoOcorrencia;

class TipoOcorrenciaRepository extends GenericRepository{
    
    public function __construct()
	{
        $this->model = new TipoOcorrencia();
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
}