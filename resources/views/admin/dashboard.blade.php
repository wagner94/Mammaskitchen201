@extends('layouts.app')

@section('title','Dashboard')


@push('css')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
">

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <p class="card-category">Clientes</p>
                  <h3 class="card-title">{{ $clienteCount }}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-warning">folder</i>
                    <a href="{{ route('cliente.index') }}">Clientes registrados</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">chrome_reader_mode</i>
                  </div>
                  <p class="card-category">Reservas</p>
                  <h3 class="card-title">{{ $reservationCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-success">date_range</i>
                    <a href="{{ route('reservation.index') }}">Reservas feitas</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Pratos</p>
                  <h3 class="card-title">{{ $pratoCount }}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">local_offer</i>
                    <a href="{{ route('prato.index') }}">Pratos registrados</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Followers</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-info">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Reservas </h4>
                  <p class="card-category"> </p>
                </div>
                <div class="card-body">
                    
                        <div class="card-content table-responsive">
                            <table id="table" class="table table-striped"  cellspacing="0" width="100%">
                                <thead class="text-info">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($reservations as $key=>$reservation)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->phone }}</td>
                                        <th>
                                            @if($reservation->status == true)
                                                <span style="color:green" class="label">Confirmed</span>
                                            @else
                                                <span style="color:red" class="label">not Confirmed yet</span>
                                            @endif

                                        </th>
                                        <td>
                                            @if($reservation->status == false)
                                                <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status',$reservation->id) }}" style="display: none;" method="POST">
                                                {!! csrf_field() !!} 
                                                </form>
                                                <button type="button" class="btn btn-info btn-sm" onclick="if(confirm('Are you verify this request by phone?')){
                                                        event.preventDefault();
                                                        document.getElementById('status-form-{{ $reservation->id }}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }"><i class="material-icons">done</i></button>
                                            @endif
                                            <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy',$reservation->id) }}" style="display: none;" method="POST">
                                            {!! method_field('DELETE') !!}
                                            {!! csrf_field() !!} 
                                            </form>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                                    }else {
                                                    event.preventDefault();
                                                    }"><i class="material-icons">delete</i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
