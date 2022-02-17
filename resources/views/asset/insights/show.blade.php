@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.insights.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.insights')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.insights.index') }}">@lang('app.insights')</a></div>
          <div class="breadcrumb-item">{{ $insight->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4>Data @lang('app.insights')</h4>
              </div>
              <div class="card-body">

              <!-- NAME -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $insight->name }}
                    </div>
                </div>

                <!-- CATEGORY -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.category')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $insight->category }}
                    </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $insight->description }}
                    </div>
                </div>

                <!-- MONTH -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.month')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $insight->month }}
                    </div>
                </div>

                <!-- YEAR -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.year')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $insight->year }}
                    </div>
                </div>

                <!-- FILE -->
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.file')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <a href="{{ $insight->url_file }}" target="_blank">{{ $insight->file }}</a> 
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
