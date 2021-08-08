<?php
namespace App\Repository;

use App\Balancete;

class BalanceteRepository extends GenericRepository{
    
    public function __construct()
	{
        $this->model = new Balancete();
        parent::__construct($this->model);
	}

    public function create($balanceteData){
        $balancete = new Balancete();
        $balancete->titulo = $balanceteData->titulo;
        $balancete->descricao = $balanceteData->descricao;
        $balancete->path = $balanceteData->balancete;
        $balancete->users_id = $balanceteData->user_id;
        return $balancete->save();
    }

    public function update($balancete){
        return $balancete->update();
    }

    public function filter($filter){
        $pages = $this->model::where('titulo','like','%'.$filter->titulo.'%')->orderBy('created_at','desc')->get();
        return $pages;
    }

}