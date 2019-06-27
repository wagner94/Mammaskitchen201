@extends('layouts.app')

@section('title', 'Clientes')

@push('css')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
          <a href="{{ route('cliente.cadastro') }}" class="btn btn-info" style="color:#fff; margin-left:28px"> Novo Cliente</a>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Lista de Clientes</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                <div class="card-content table-responsive">
                  <table id="table" class="table"  cellspacing="0" width="100%">
                      <thead class=" text-info">
                     
                        <th>
                          Nome do Cliente
                        </th>
                        <th>
                          Telefone
                        </th>
                        <th>
                           E-mail
                        </th>
                        <th>
                           Morada
                        </th>
                     
                        <th>
                          Action
                        </th>
                     
                      </thead>
                      <tbody>
                          @forelse($clientes as $cliente)
                            <tr>
                            
                            
                              <td>
                              {{ $cliente->nome }}
                              </td>
                             
                              <td>
                              {{ $cliente->telefone }}
                              </td>
                              <td>
                              {{ $cliente->email }}
                              </td>
                              <td>
                              {{ $cliente->morada }}
                              </td>
                            
                              <td>
                              
                          
                           <form id="delete-form-{{ $cliente->id }}" action="{{ route('cliente.destroy',
                               $cliente->id) }}" style="" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-danger btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this Client?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $cliente->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">delete</i></button>
                          </td>
                          @empty
                         <td colspan="6" style="color:red">
                               Não existem Clientes cadastrados
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