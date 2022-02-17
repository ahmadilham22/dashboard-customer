@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.engine.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.operational.operational')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#"> @lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('operational.engine.index') }}"> @lang('app.operational.engine')</a></div>
          <div class="breadcrumb-item">{{ $engine->engine_name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data  @lang('app.operational.engine')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.engine_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('engine_name') ?? $engine->engine_name }}" name="engine_name" class="@error('engine_name') is-invalid @enderror form-control" readonly>
                        @error('engine_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <textarea name="deskripsi" class="@error('deskripsi') is-invalid @enderror form-control" row="3" readonly>{{ old('deskripsi') ?? $engine->deskripsi}}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.expose_port')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('expose_port') ?? $engine->expose_port }}" name="expose_port" class="@error('expose_port') is-invalid @enderror form-control" readonly>
                        @error('expose_port')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.type')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ $engine->jenis }}" name="expose_port" class="@error('expose_port') is-invalid @enderror form-control" readonly>
                        @error('jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.creator')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('pembuat') ?? $engine->pembuat}}" name="pembuat" class="@error('pembuat') is-invalid @enderror form-control" readonly>
                        @error('pembuat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.folder_path')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('lokasi_folder') ?? $engine->lokasi_folder}}" name="lokasi_folder" class="@error('lokasi_folder') is-invalid @enderror form-control" readonly>
                        @error('lokasi_folder')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.operational.git_url')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <input type="text" value="{{ old('git_url') ?? $engine->git_url}}" name="git_url" class="@error('git_url') is-invalid @enderror form-control" readonly>
                        @error('git_url')
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
