@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.enginexdatabase.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.operational.database')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#"> @lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('operational.database.index') }}"> @lang('app.operational.database')</a></div>
          <div class="breadcrumb-item">{{ $database->nama_database }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data  @lang('app.operational.database')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.db_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('nama_database') ?? $database->nama_database }}" name="nama_database" class="@error('nama_database') is-invalid @enderror form-control" readonly>
                        @error('nama_database')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.db_type')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{$database->jenis_database }}" name="port" class="@error('port') is-invalid @enderror form-control" readonly>
                        @error('jenis_database')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.port')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('port') ?? $database->port }}" name="port" class="@error('port') is-invalid @enderror form-control" readonly>
                        @error('port')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.server_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{$database->server->server_name }}" name="port" class="@error('port') is-invalid @enderror form-control" readonly>
                        @error('id_server')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
