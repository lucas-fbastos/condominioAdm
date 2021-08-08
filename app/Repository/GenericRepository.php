<?php
namespace App\Repository;

class GenericRepository{

  
    private $model;

    public function __construct($modelParam)
    {
        $this->model = $modelParam;
    }

    /**
     * @param UnsignedBigInt
     *
     */
    public function getById($id)
    {
        $record = $this->model::find($id);
        return $record;
    }

    /**
     * @param int
     *
     */
    public function allPaged($pageSize = 5){
        $pages = $this->model::orderBy('created_at','desc')->paginate($pageSize);
        return $pages;
    }

    public function getList(){
        $list = $this->model::get();
        return $list;
    }

    public function getLast($size = 3){
        return $this->model::orderBy('created_at','desc')->take($size)->get();
    }


}