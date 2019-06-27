@extends('layouts.app')

@section('title', 'Bebida')

@push('css')

@endpush

@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Registro de Bebidas</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form action="{{ route('bebida.store') }}" style="" method="POST" enctype="multipart/form-data">
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
                          <select class="form-control" placeholder="Selecione a categoria" name="categori" id="categori" required>
                              <option value="">Selecione a categoria</option>
                              <option value="Aperitivos">Aperitivos</option>
                              <option value="Jantar">Jantar</option>
                              <option value="Lanche">Lanche</option>
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
                          <label class="bmd-label-floating">Preço (kz)</label>
                          <input type="number" class="form-control" name="preco" id="preco" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="control-label">Imgem</label>
                          <input type="file" name="imagem" id="imagem">
                      </div>
                    </div>
                    
                    <a href="{{ route('bebida.index') }}" class="btn btn-info" style="color:#fff"> Voltar</a>
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