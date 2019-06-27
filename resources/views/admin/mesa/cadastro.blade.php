@extends('layouts.app')

@section('title', 'Mesa')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Registro de Mesas</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('mesa.store') }}" style="" method="POST" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome</label>
                          <input type="text" class="form-control" id="nome" name="nome">
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
                   
                    
                   
                    <a href="{{ route('mesa.index') }}" class="btn btn-info" style="color:#fff"> Voltar</a>
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