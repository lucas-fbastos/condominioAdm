<?php

namespace App\Http\Controllers;

use App\Service\TipoOcorrenciaService;
use App\Service\OcorrenciaService;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class OcorrenciaController extends Controller
{
    private $tipoOcorrenciaService;
    private $ocorrenciaService;

    public function __construct(TipoOcorrenciaService $tipoOcorrencia, OcorrenciaService $ocorrenciaService){
        $this->tipoOcorrenciaService = $tipoOcorrencia;
        $this->ocorrenciaService = $ocorrenciaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposOcorrencia = $this->tipoOcorrenciaService->getAll();
        $ocorrencias = $this->ocorrenciaService->getAllPaged();
        return view('livroOcorrencias.home',['tiposOcorrencia'=>$tiposOcorrencia,'ocorrencias'=>$ocorrencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposOcorrencia = $this->tipoOcorrenciaService->getAll();
        return view('livroOcorrencias.insereOcorrencia',['tiposOcorrencia'=>$tiposOcorrencia]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipoOcorrencia' => 'required|numeric',
            'descricao' => 'required|string|max:255',
            'dataOcorrencia' => 'required'
        ]);
        $auth = Auth::user();
        $input = (object) $request->only(['tipoOcorrencia','descricao','dataOcorrencia']);
        $input->user_id = $auth->id;
        $this->ocorrenciaService->create($input);
        return redirect('/livroOcorrencias'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ocorrencia = $this->ocorrenciaService->getById($id);
        $tiposOcorrencia = $this->tipoOcorrenciaService->getAll();
        return view('livroOcorrencias.insereOcorrencia',['tiposOcorrencia'=>$tiposOcorrencia,'ocorrencia'=>$ocorrencia]);
    }

    public function filter(Request $request)
    {
        $auth = Auth::user();
        $input = (object) $request->only(['tipoOcorrencia']);
        $ocorrencias = $this->ocorrenciaService->filter($input);
        $tiposOcorrencia = $this->tipoOcorrenciaService->getAll();
        return view('livroOcorrencias.home',['ocorrencias'=>$ocorrencias, 'tiposOcorrencia'=>$tiposOcorrencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ocorrencia = $this->ocorrenciaService->getById($id);
        if($ocorrencia!=null){
            $auth = Auth::user();
            $input = (object) $request->only(['tipoOcorrencia','descricao','dataOcorrencia']);
            $input->user_id = $auth->id;
            $this->ocorrenciaService->update($ocorrencia,$input); 
            return redirect('/livroOcorrencias'); 
        }
        return redirect('/livroOcorrencias'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->ocorrenciaService->delete($id);
        return redirect('/livroOcorrencias');
    }
}
