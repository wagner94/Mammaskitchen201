@extends('layouts.app')

@section('title', 'Bebidas')

@push('css')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush
@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
          <a href="{{ route('bebida.cadastro') }}" class="btn btn-info" style="color:#fff; margin-left:28px"> Nova Bebida</a>

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Lista das Bebidas</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <table id="table" class="table"  cellspacing="0" width="100%">
                      <thead class=" text-info">
                        <th>
                         
                        </th>
                        <th>
                          Nome
                        </th>
                        <th>
                          Preço
                        </th>
                        <th>
                           Descrição
                        </th>
                     
                        <th>
                          Action
                        </th>
                     
                      </thead>
                      <tbody>
                          @forelse($bebidas as $bebida)
                            <tr>
                            
                              <td>
                               <img src="{{ asset('uploads/bebidas/'.$bebida->bebida_image) }}" style="width:10%"> 
                              </td>
                              <td>
                              {{ $bebida->nome }}
                              </td>
                              <td>
                              {{ number_format($bebida->preco,'2',',','.') }}
                              </td>
                              <td>
                              {{ $bebida->descricao }}
                              </td>
                            
                              <td>
                              
                          
                           <form id="delete-form-{{ $bebida->id }}" action="{{ route('bebida.destroy',
                               $bebida->id) }}" style="" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-danger btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $bebida->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">delete</i></button>
                          </td>
                          @empty
                         <td colspan="6" style="color:red">
                               Não existem bebidas cadastradas
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