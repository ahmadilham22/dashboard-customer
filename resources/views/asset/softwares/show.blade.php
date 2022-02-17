@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.softwares.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.software')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.softwares.index') }}">@lang('app.software')</a></div>
          <div class="breadcrumb-item">{{ $software->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.software')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $software->name }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $software->description }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.url')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <a href="{{$software->url}}" target="_blank">{{ $software->url }}</a>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.file')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <a href="{{$software->url_file}}" target="_blank">{{ $software->file }}</a>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.license')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $software->license }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.price')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $software->price_label }}
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
