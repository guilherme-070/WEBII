<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EixoRepository;
use App\Models\Eixo;

class EixoController extends Controller
{
    
    protected $repository;
    public function __construct(){
    $this->repository = new EixoRepository();
    }

    public function index()
    {
        $data = $this-> repository->selectAll();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objEixo = new Eixo();
        $objEixo->nome = $request->nome;
        $this->repository->save($objEixo);


        return "OK - Store!!";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this-> repository->findById($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $objEixo = $this->repository->findById($id);
        if(isset($eixo)){
            $eixo->nome = mb_strtoupper($request->nome, 'UTF-8');
            $this->repository->save($eixo);
            return "OK - Update!!";
        }

        return "ERRO - Update!!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)){
            return "OK - Destroy!!";
        }
        return "ERROR - Destroy!!";
    }
}