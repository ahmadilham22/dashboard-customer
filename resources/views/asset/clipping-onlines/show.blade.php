@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.clipping-onlines.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.clipping_online')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.clipping-onlines.index') }}">@lang('app.clipping_online')</a></div>
          <div class="breadcrumb-item">@lang('app.clipping_online') {{ optional($clippingOnline->client)->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4>Data @lang('app.clipping_online')</h4>
              </div>
              <div class="card-body">

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.client_name')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ optional($clippingOnline->client)->name }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.date_news')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $clippingOnline->date_news }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.date')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {{ $clippingOnline->date }}
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.content')</label>
                    <div class="col-sm-6 col-md-9 col-lg-6">
                        {!! $clippingOnline->content !!}
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
