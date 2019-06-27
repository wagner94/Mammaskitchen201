@extends('layouts.app')

@section('title', 'Clientes')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Registro de Clientes</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('cliente.store') }}" style="" method="POST" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome Cliente</label>
                          <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gênero</label>
                          <input type="text" class="form-control" id="gender" name="gender" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nº Telefone</label>
                          <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">E-mail</label>
                          <input type="text" class="form-control" id="correio" name="correio" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Morada</label>
                          <input type="text" class="form-control" id="morada" name="morada" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome Cliente</label>
                          <input type="text" class="form-control" id="" name="">
                        </div>
                      </div>
                    </div>

                   
                    
                    <a href="{{ route('cliente.index') }}" class="btn btn-info" style="color:#fff"> Voltar</a>
                    <button type="submit" class="btn btn-info pull-right">Registrar</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
 @endsection 