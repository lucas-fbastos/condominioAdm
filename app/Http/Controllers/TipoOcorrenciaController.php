<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TipoOcorrenciaService;
class TipoOcorrenciaController extends Controller
{
    private $tipoOcorrenciaService;

    public function __construct( TipoOcorrenciaService $tipoOcorrenciaService){
        $this->tipoOcorrenciaService = $tipoOcorrenciaService;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'descricao_tipo' => 'required|string|max:255',
        ]);
        $auth = Auth::user();
        $input = (object) $request->only(['descricao_tipo','icon']);
        $input->user_id = $auth->id;
        $this->tipoOcorrenciaService->create($input);
        return redirect('/livroOcorrencias'); 
    }
}
