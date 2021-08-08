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
        //dd($ocorrencias);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
