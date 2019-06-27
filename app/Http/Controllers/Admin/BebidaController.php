<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Bebida;
use App\Contacto;
use Brian2694\Toastr\Facades\Toastr;




class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bebidaCount = Bebida::count();
        $bebidas = Bebida::all();
        $contactos = Contacto::all();
        $contactoCount = Contacto::count();
        return view('admin.bebida.index',compact('bebidas','bebidaCount','contactos','contactoCount'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.bebida.cadastro');


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
            'descricao' => 'required',
            'imagem' => 'required|mimes:jpeg,png,jpg,bmp',
            'nome' => 'required',
            'preco' => 'required'
            
        ]);
        
        $image = $request->file('imagem');
        $slug = str_slug($request->nome);

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            
            if(!file_exists('uploads/bebidas')){
                mkdir('uploads/bebidas',0777,true);
            }

            $image->move('uploads/bebidas',$imagename);
        }else{
            $imagename = "default.png";
        }

        $bebida = new Bebida();
        
        $bebida->descricao = $request->descricao;
        $bebida->bebida_image = $imagename;
        $bebida->nome = $request->nome;
        $bebida->preco = $request->preco;
        $bebida->save();

        //$bebida->status = false;
        //Toastr::success('Reservation request sent successfully. We will confirm to you shortly','Success',["positionClass"=> "toast-top-center"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function show(Bebida $bebida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function edit(Bebida $bebida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bebida $bebida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bebida  $bebida
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Bebida::find($id)->delete();
        return redirect()->back();
    }
}
