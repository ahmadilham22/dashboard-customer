@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.enginexdatabase.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.add') @lang('app.operational.enginexdatabase')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item">@lang('app.add') @lang('app.operational.enginexdatabase')</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.operational.enginexdatabase')</h4>
              </div>

              <div class="card-body">
                <form class="form" action="{{ route('operational.enginexdatabase.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row align-items-center">
                      <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.engine_name')</label>
                      <div class="col-sm-6 col-md-9 col-lg-6">
                          <select name="id_engine" class="form-control">
                              @foreach($engine as $r)
                              <option value="{{$r->id_engine}}" {{ old('id_engine')  == $r->id_engine ? 'selected' : ''}}>{{$r->engine_name}}</option>
                              @endforeach
                          </select>
                          @error('id_engine')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.db_name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <select name="id_database" class="form-control">
                                @foreach($database as $item)
                                <option value="{{$item->id_database}}" {{ old('id_database')  == $item->id_database ? 'selected' : ''}}>{{$item->nama_database}}</option>
                                @endforeach
                            </select>
                            @error('id_database')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection