<?php

namespace App\Http\Controllers\Admin;

use App\Mesa;
use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;



class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesaCount = Mesa::count();
        $mesas = Mesa::all();
        $contactos = Contacto::all();
        $contactoCount = Contacto::count();
        return view('admin.mesa.index',compact('mesas','mesaCount','contactos','contactoCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mesaCount = Mesa::count();
        $mesas = Mesa::all();
        $contactos = Contacto::all();
        $contactoCount = Contacto::count();
        return view('admin.mesa.cadastro',compact('mesas','mesaCount','contactos','contactoCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'codigo' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'estado' => 'required'
            
        ]);

        $mesa = new Mesa();
        
        $mesa->codigo = $request->codigo;
        $mesa->nome = $request->nome;
        $mesa->descricao = $request->descricao;
        $mesa->estado_mesa = $request->estado;
        
        $mesa->save();
        Toastr::success('Reservation request sent successfully. We will confirm to you shortly','Success',
        ["positionClass"=> "toast-top-right"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        //
    }
}
