@extends('layouts.app')

@section('title', 'Contactos')

@push('css')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Lista de Contactos</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  
                            <table id="table" class="table"  cellspacing="0" width="100%">
                      <thead class=" text-info">
                     
                        <th>
                        Assunto
                        </th>
                        <th>
                        Mensagem

                        </th>
                        <th>
                           E-mail
                        </th>
                        <th>
                           Cliente
                        </th>
                     
                        <th>
                          Action
                        </th>
                     
                      </thead>
                      <tbody>
                          @forelse($contactos as $key=> $contacto)
                            <tr>
                            
                            <td>
                              {{ $contacto->assunto }}
                              </td>

                              <td>
                              {{ $contacto->mensagem }}
                              </td>
                             
                              
                              <td>
                              {{ $contacto->email }}
                              </td>
                              <td>
                             
                              MA-0{{ $contacto->cliente_id }}
                              </td>
                            
                              <td>
                              
                          
                           <form id="delete-form-{{ $contacto->id }}" action="{{ route('contacto.destroy',
                               $contacto->id) }}" style="" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-danger btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this Contact?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $contacto->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">delete</i></button>
                          </td>
                          @empty
                         <td colspan="6" style="color:red">
                               Nenhum COntacto encontrado
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