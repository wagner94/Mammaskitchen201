<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contacto( Request $request)
    {
        //
        $this->validate($request ,[
            'assunto' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            
        ]);

        $contacto = new Contacto();
        
        $contacto->email = $request->email;
        $contacto->assunto = $request->assunto;
        $contacto->mensagem = $request->message;
        $contacto->cliente_id = 1;
        
        $contacto->save();
        Toastr::success('Reservation request sent successfully. We will confirm to you shortly','Success',
        ["positionClass"=> "toast-top-right"]);
        return redirect()->back();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
