@extends('layouts.app')

@section('title','Slider')

@push('css')

@endpush

@section('content')
    


    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            @include('layouts.partial.msg')

              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Registro de Slider</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                  {!! csrf_field() !!}
 
                    <div class="row">
                      <div class="col-md-6">
                      <div class="form-group label-floating">
                                            <label class="control-label">Title</label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                      </div>
                      <div class="col-md-6">
                      <div class="form-group label-floating">
                                            <label class="control-label">Sub Title</label>
                                            <input type="text" class="form-control" name="sub_title">
                                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                      <div class="col-md-6">
                      <label class="control-label">Image</label>
                                        <input type="file" name="image">
                      </div>
                    </div>
                    
                    <a href="{{ route('slider.index') }}" class="btn btn-danger">Voltar</a>
                                <button type="submit" class="btn btn-info">Salvar</button>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush