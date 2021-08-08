<?php
namespace App\Repository;

use App\User;

class UserRepository extends GenericRepository{
    
    public function __construct()
	{
        $this->model = new User();
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