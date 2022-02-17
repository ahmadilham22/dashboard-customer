@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.models.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.model')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.models.index') }}">@lang('app.model')</a></div>
          <div class="breadcrumb-item">{{ $model->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.model')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $model->name }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $model->description }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.debit')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $model->debit }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.credit')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $model->credit }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.value')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $model->value }}
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
