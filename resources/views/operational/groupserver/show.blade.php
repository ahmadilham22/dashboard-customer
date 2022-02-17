@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.groupserver.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.operational.operational')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#"> @lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('operational.groupserver.index') }}"> @lang('app.operational.group_server')</a></div>
          <div class="breadcrumb-item">{{ $server->server_name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data  @lang('app.operational.group_server')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.group_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('nama_group') ?? $server->nama_group }}" name="nama_group" class="@error('nama_group') is-invalid @enderror form-control" readonly>
                        @error('nama_group')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.client')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('client') ?? $server->client}}" name="client" class="@error('client') is-invalid @enderror form-control" readonly>
                        @error('client')
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
