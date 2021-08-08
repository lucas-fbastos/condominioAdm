<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BalanceteService;
use App\Service\OcorrenciaService;

class HomeController extends Controller
{

    private $balanceteService;
    private $ocorrenciaService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BalanceteService $balanceteService, OcorrenciaService $ocorrenciaService)
    {
        $this->balanceteService=  $balanceteService;
        $this->ocorrenciaService = $ocorrenciaService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastBalancete = $this->balanceteService->getLast();
        $ocorrencias = $this->ocorrenciaService->getAllPaged();
        //dd($lastBalancete);
        return view('home',['lastBalancete'=>$lastBalancete,'ocorrencias'=>$ocorrencias]);
    }
}
