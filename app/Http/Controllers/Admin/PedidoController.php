<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Pedido;
use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;



class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pedidos = Pedido::all();
        $pedidoCount = Pedido::count();
        
        
        $contactoCount = Contacto::count();
        $contactos = Contacto::all();
        return view('admin.pedido.index',compact('pedidos','contactos','pedidoCount','contactoCount'));
    }

    public function livesearch(Request $request){
        $results[] = array();

        $term = $request->get('term');
        $data = DB::table('clientes')->where('nome','LIKE','%'.$term.'%')->get();

        foreach($data as $result){
            $results = ['value' => $result ->nome];
        }
          
          return response()->json($results);

    }

    /*public function ajax()
    {
        //
        if(isset($_POST["nomeClient"])){

            $queries = Pedido::all();
            $rowsCount = Pedido::count();
            //
            if($rowsCount > 0){
                while($row = $query->fetch_assoc()){
                    echo '<option value="'.$row['id_modelo'].'">'.utf8_encode($row['nome_modelo']).'</option>';
                }
            }else{
                echo '<option value="">Modelo indisponível</option>';
            }
        }
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contactoCount = Contacto::count();
        $contactos = Contacto::all();
        return view('admin.pedido.cadastro',compact('pedidos','contactos','pedidoCount','contactoCount'));
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
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
