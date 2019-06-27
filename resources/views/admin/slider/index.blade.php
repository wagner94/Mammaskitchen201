@extends('layouts.app')

@section('title', 'Sliders')

@push('css')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
          <a href="{{ route('slider.create') }}" class="btn btn-info" style="color:#fff; margin-left:28px"> Novo Slider</a>

            <div class="col-md-12">
            @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Lista dos Sliders</h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                <div class="card-content table-responsive">
                
                  <table id="table" class="table table table-striped"   width="100%">
                      <thead class=" text-info">
                        <th>
                         ID
                        </th>
                        <th>
                          Título
                        </th>
                        <th>
                          Sub título
                        </th>
                        <th>
                           Imagem
                        </th>
                    
                     
                        <th>
                          Created at
                        </th>
                        <th>
                          Updated at
                        </th>
                        <th>
                         Actions
                        </th>
                     
                      </thead>
                      <tbody>
                          @forelse($sliders as $key=>$slider)
                            <tr>
                            
                              <td>
                              {{ $key+1 }}                              
                              </td>
                              <td>
                              {{ $slider->title }}
                              </td>
                              <td>
                              {{ $slider->sub_title }}
                              </td>
                              <td>
                              {{ $slider->image }}
                              </td>
                              
                              <td>
                              {{ $slider->created_at }}
                              </td>
                              <td>
                              {{ $slider->updated_at }}
                              </td>
                              <td>
                                <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy',$slider->id) }}" style="display: none;" method="POST">
                                   
                                    {!! method_field('DELETE') !!}
                                {!! csrf_field() !!} 
                                </form>
                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $slider->id }}').submit();
                                }else {
                                    event.preventDefault();
                                        }"><i class="material-icons">delete</i></button>
                            </td>
                              
                          
                           
                          @empty
                         <td colspan="6" style="color:red">
                               Não existem pratos cadastrados
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