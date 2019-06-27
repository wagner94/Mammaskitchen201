@extends('layouts.app')

@section('title', 'Pedidos')

@push('css')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
          <a href="{{ route('pedido.cadastro') }}" class="btn btn-info" style="color:#fff; margin-left:28px"> Novo Pedido</a>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Lista de Pedidos</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                <div class="card-content table-responsive">
                            <table id="table" class="table"  cellspacing="0" width="100%">
                      <thead class=" text-info">
                      
                        <th>
                          Nome
                        </th>
                        
                        <th>
                           Descrição
                        </th>
                        <th>
                          Criado em
                        </th>
                     
                        <th>
                          Action
                        </th>
                     
                      </thead>
                      <tbody>
                          @forelse($pedidos as $pedido)
                            <tr>
                            
                              
                              <td>
                              {{ $pedido->nome }}
                              </td>
                              <td>
                              {{ $pedido->descricao }}
                              </td>
                              
                              <td>
                              {{ $pedido->created_at }}
                              </td>
                              
                              <td>
                              

                              <form id="edit-form-{{ $pedido->id }}" action="{{ route('pedido.edit',
                               $pedido->id) }}" style="" method="POST">
                                {!! method_field('UPDATE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-info btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('edit-form-{{ $pedido->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">edit</i></button>
                          
                           <form id="delete-form-{{ $pedido->id }}" action="{{ route('pedido.destroy',
                               $pedido->id) }}" style="" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-danger btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $pedido->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">delete</i></button>
                          </td>
                          @empty
                         <td colspan="6" style="color:red">
                               Não existem pedidos feitos
                          </td>
                        
                    
                        </tr>
                      @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
@endsection   
@push('scripts')
    


<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js
"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endpush