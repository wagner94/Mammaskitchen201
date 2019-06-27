<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Prato;
use App\Contacto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class PratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pratoCount = Prato::count();
        $pratos = Prato::all();
        
        $contactoCount = Contacto::count();
        $contactos = Contacto::all();
        return view('admin.prato.index', compact('pratos','contactos','pratoCount','contactoCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactoCount = Contacto::count();
        $contactos = Contacto::all();
        return view('admin.prato.cadastro',compact('contactos','contactoCount'));

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
            'descricao' => 'required',
            'imagem' => 'required|mimes:jpeg,png,jpg,bmp',
            'nome' => 'required',
            'preco' => 'required',
            'categoria' => 'required'
            
        ]);
        
        $image = $request->file('imagem');
        $slug = str_slug($request->nome);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            if(!file_exists('uploads/pratos')){
                mkdir('uploads/pratos',0777,true);
            }

            $image->move('uploads/pratos',$imagename);
        }else{
            $imagename = "default.png";
        }
        
        $prato = new Prato();

        $prato->descricao = $request->descricao;
        $prato->prato_image =  $imagename;
        $prato->nome = $request->nome;
        $prato->preco = $request->preco;
        $prato->categoria = $request->categoria;
        $prato->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function show(Prato $prato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function edit(Prato $prato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prato $prato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prato  $prato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Prato::find($id)->delete();
        return redirect()->back();
    }
}
