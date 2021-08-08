<?php

namespace App\Service;

use Illuminate\Support\Facades\Log;
use App\Repository\BalanceteRepository;
class BalanceteService{

    private $repository;

    public function __construct(BalanceteRepository $balanceteRepository, UserService $userService, FileUploadService $fileUploadService){
        $this->repository = $balanceteRepository;
        $this->userService = $userService;
        $this->fileUploadService = $fileUploadService;
    }

    public function getById($id){
      return $this->repository->getById($id);
    }

    public function getAllPaged(){
      return $this->repository->allPaged(6);
    }

    public function filter($filtro){
      return $this->repository->filter($filtro);
    }

    public function create($postData){
      $user = $this->userService->getById($postData->user_id);
      if($user==null){
        return;
      }    
      if(property_exists($postData, 'balancete')){
          $path = $this->fileUploadService->uploadFile($postData->balancete,'balancetes','public');
          $postData->balancete = $path; 
      }
      try{
          return $this->repository->create($postData);
      }catch(\Exception $e){
          Log::error($e->getMessage());
          throw $e;
      }
  }

  public function update($postData, $id){
    $user = $this->userService->getById($postData->user_id);
    $balancete = $this->getById($id);
    if($user==null || $balancete ==null){
      return;
    }    
    if(property_exists($postData, 'balancete')){
        $this->fileUploadService->deleteFile($balancete->path);
        $path = $this->fileUploadService->uploadFile($postData->balancete,'balancetes','public');
        $balancete->path = $path; 
    }
    $balancete->titulo = $postData->titulo;
    $balancete->descricao = $postData->descricao;
    $balancete->users_id = $user->id;
    try{
        return $this->repository->update($balancete);
    }catch(\Exception $e){
        Log::error($e->getMessage());
        throw $e;
    }
  }

  public function getLast(){
      return $this->repository->getLast(1);
  }

  public function delete($id){
    try{
      if($id != null && is_numeric($id)){
          $balancete = $this->getById($id);
          if($balancete){
              $path = $balancete->path;
              $balancete->delete();
              $this->fileUploadService->deleteFile($path);
          }
      }
    }catch(\Exception $e){
        Log::error($e->getMessage());
        throw $e;
    }
  }
}