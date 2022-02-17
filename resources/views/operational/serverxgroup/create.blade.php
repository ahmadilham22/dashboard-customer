@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.serverxgroup.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.add') @lang('app.operational.serverxgroup')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item">@lang('app.add') @lang('app.operational.serverxgroup')</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.operational.serverxgroup')</h4>
              </div>

              <div class="card-body">
                <form class="form" action="{{ route('operational.serverxgroup.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row align-items-center">
                      <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.server_name')</label>
                      <div class="col-sm-6 col-md-9 col-lg-6">
                          <select name="id_group_server" class="form-control">
                              @foreach($group as $r)
                              <option value="{{$r->id_group_server}}" {{ old('id_group_server')  == $r->id_group_server ? 'selected' : ''}}>{{$r->nama_group}}</option>
                              @endforeach
                          </select>
                          @error('id_group_server')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                    </div>
                    
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.server_name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <select name="id_server" class="form-control">
                                @foreach($server as $item)
                                <option value="{{$item->id_server}}" {{ old('id_server')  == $item->id_server ? 'selected' : ''}}>{{$item->server_name}}</option>
                                @endforeach
                            </select>
                            @error('id_server')
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