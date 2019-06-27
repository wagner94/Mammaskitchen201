@extends('layouts.app')

@section('title', 'Pedidos')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Registro de Pedido</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="{{ route('pedido.store') }}" style="" method="POST" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="">Nome do Cliente</label>
                          <input type="text" class="form-control" id="nomeClient" name="nomeClient">
                          <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <select class="form-control" placeholder="Selecione a categoria" name="estado" id="estado" required>
                              <option value="">Selecione o estado</option>
                              <option value="1">Reservada</option>
                              <option value="2">Disponível</option>
                              <option value="0">Indisponível</option>

                              
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Descrição</label>
                          <textarea type="text" class="form-control" name="descricao" id="descricao">
                          </textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Código</label>
                          <input type="text" class="form-control" id="codigo" name="codigo">
                        </div>
                      </div>
                      </div>
                
                   
                    
                   
                    <a href="{{ route('pedido.index') }}" class="btn btn-info" style="color:#fff"> Voltar</a>
                    <button type="submit" class="btn btn-info pull-right">Seguir</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
 @endsection 
 @push('scripts')
 <script>
      $("#nomeClient").autocomplete({
        var _token = $('input[name="_token"]').val();
         $.ajax({
          url:" {{ route('pedido.livesearch') }}",
          method:"GET",
          data:{query:query, _token:_token},
          success:function(data){
            $("#idCliente").val(ui.item.id);
          }
         });
      });
  </script>
@endpush
 