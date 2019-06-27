@extends('layouts.app')

@section('title', 'Reservas')


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
                  <h4 class="card-title ">Lista de Reservas</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table  id="table" class="table table-striped"  cellspacing="0" width="100%">
                      <thead class=" text-info">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                           Email
                        </th>
                        <th>
                          Date and Time
                        </th>
                        <th>
                          Message
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Date Created
                        </th>
                        <th>
                          Action
                        </th>
                     
                      </thead>
                      <tbody>
                      @forelse($reservations as $key=>$reservation)
                        <tr>
                          <td>
                            {{ $key + 1}}
                          </td>
                          <td>
                            {{ $reservation->name }}
                          </td>
                          <td>
                          {{ $reservation->phone }}
                          </td>
                          <td>
                          {{ $reservation->email }}
                          </td>
                          <td>
                          {{ $reservation->date_and_time }}
                          </td>
                          <td>
                          {{ $reservation->message }}
                          </td>
                          <td>
                          @if($reservation->status == true)
                              <span style="color:green" class="label">Confirmed</span>
                          @else
                              <span style="color:red" class="label">not Confirmed</span>
                          @endif
                          </td>
                          <td>
                          {{ $reservation->created_at }}
                          </td> 
                          <td>
                              @if($reservation->status == false)
                                <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',
                                  $reservation->id) }}" style="" method="POST">
                                  {!! csrf_field() !!}
                              
                                </form>
                                <button type="button" class="btn btn-info btn-sm"
                                onclick="if(confirm('Are you verify this reservation by phone?')){
                                  event.preventDefault();
                                  document.getElementById('status-form-{{ $reservation->id }}').submit();
                                }else{
                                  event.preventDefault();
                                }"> <i class="material-icons">done</i></button>
                              @endif
                          
                           <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',
                               $reservation->id) }}" style="" method="POST">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}  
                          
                           </form>
                              <button type="button" class="btn btn-danger btn-sm"
                              onclick="if(confirm('Are you sure? You want to delete this?')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $reservation->id }}').submit();
                              }else{
                                event.preventDefault();
                              }"> <i class="material-icons">delete</i></button>
                          </td>

                          @empty
                         <td colspan="6" style="color:red">
                               Não existem reservas feitas
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