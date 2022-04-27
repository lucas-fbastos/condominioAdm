<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service\BalanceteService;
use Illuminate\Support\Facades\Validator;

class GestaoFinanceiraController extends Controller
{
 
    private $balanceteService;
  
 
    public function __construct(BalanceteService $balanceteService){
        $this->balanceteService = $balanceteService;
       
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $balancetes = $this->balanceteService->getAllPaged();
           
            return \view('gestaofinanceira.home', ['balancetes'=>$balancetes]);
        }catch(Exception $e){
             return redirect('gestaofinanceira')->with('status', 'Ocorreu um erro');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestaofinanceira.insereBalancete');
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
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'balancete' => 'mimes:jpeg,png,jpg,pdf'
        ]);
        $auth = Auth::user();
        $input = (object) $request->only(['titulo','balancete','descricao']);
        $input->user_id = $auth->id;
        $this->balanceteService->create($input);
        return redirect('/gestaoFinanceira');
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
        $balancete = $this->balanceteService->getById($id);
        return view('gestaofinanceira.editaBalancete',['balancete'=>$balancete]);
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
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'balancete' => 'required|mimes:jpeg,png,jpg,pdf'
        ]);
        $auth = Auth::user();
        $input = (object) $request->only(['titulo','balancete','descricao']);
        $input->user_id = $auth->id;
        $this->balanceteService->update($input, $id);
        return redirect('/gestaoFinanceira');
    }

    public function filter(Request $request)
    {
        $auth = Auth::user();
        $input = (object) $request->only(['titulo']);
        $balancetes = $this->balanceteService->filter($input);
        return view('gestaofinanceira.home',['balancetes'=>$balancetes]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->balanceteService->delete($id);
        return redirect('/gestaoFinanceira');
    }
}
