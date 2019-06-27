<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use App\Contacto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clienteCount = Cliente::count();
        $clientes = Cliente::all();
        $contactos = Contacto::all();
        $contactoCount = Contacto::count();
        return view('admin.cliente.index', compact('clientes','clienteCount','contactos','contactoCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contactos = Contacto::all();
        $contactoCount = Contacto::count();
        return view('admin.cliente.cadastro', compact('contactos','contactoCount'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request ,[
            'nomeCliente' => 'required',
            'gender' => 'required',
            'correio' => 'required',
            'phone' => 'required',
            'morada' => 'required'
            
        ]);
        
       

        $cliente = new Cliente();
        
        $cliente->nome = $request->nomeCliente;
        $cliente->genero = $request->gender;
        $cliente->telefone = $request->phone;
        $cliente->morada = $request->morada;
        $cliente->email = $request->correio;
        $cliente->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
