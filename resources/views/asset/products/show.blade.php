@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.product')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.products.index') }}">@lang('app.product')</a></div>
          <div class="breadcrumb-item">{{ $product->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.product')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->name }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->description }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.url')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->url }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.debit')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->debit }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.credit')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->credit }}
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.value')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $product->value_label }}
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
