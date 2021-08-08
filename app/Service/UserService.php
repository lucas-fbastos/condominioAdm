<?php

namespace App\Service;

use App\Repository\UserRepository;
class UserService{

    private $repository;

    public function __construct(UserRepository $userRepository){
        $this->repository = $userRepository;
    }

    public function getAllPaged(){
      return $this->repository->allPaged(6);
    }

    public function getById($id){
      return $this->repository->getById($id);
    }
}