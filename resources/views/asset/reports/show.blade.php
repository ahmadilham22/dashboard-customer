@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.reports.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.reports')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.reports.index') }}">@lang('app.reports')</a></div>
          <div class="breadcrumb-item">@lang('app.report') {{ optional($report->client)->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4>Data @lang('app.reports')</h4>
              </div>
              <div class="card-body">

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.client_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ optional($report->client)->name }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.type')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $report->type }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.start_date')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $report->start_date }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.end_date')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $report->end_date }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $report->description }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.file')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        <a href="{{ $report->url_file }}" target="_blank">{{ $report->file_name }}</a> 
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
