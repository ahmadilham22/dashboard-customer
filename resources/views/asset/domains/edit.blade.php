@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.domains.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.edit') @lang('app.domain')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.domains.index') }}">@lang('app.domain')</a></div>
          <div class="breadcrumb-item">@lang('app.edit') {{ $domain->name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data @lang('app.domain')</h4>
              </div>
              <div class="card-body">
                <form class="form" action="{{ route('asset.domains.update', $domain->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('name', $domain->name) }}" name="name" class="@error('name') is-invalid @enderror form-control">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.buy_from')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('buy_from', $domain->buy_from) }}" name="buy_from" class="@error('buy_from') is-invalid @enderror form-control">
                            @error('buy_from')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.buy_date')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="date" step="0.01" value="{{ old('buy_date', $domain->buy_date) }}" name="buy_date" class="@error('buy_date') is-invalid @enderror form-control">
                            @error('buy_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.expired_date')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="date" step="0.01" value="{{ old('expired_date', $domain->expired_date) }}" name="expired_date" class="@error('expired_date') is-invalid @enderror form-control">
                            @error('expired_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.price')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" step="0.01" value="{{ old('price', $domain->price) }}" name="price" class="@error('price') is-invalid @enderror form-control">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.value')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" step="0.01" value="{{ old('value', $domain->value) }}" name="value" class="@error('value') is-invalid @enderror form-control">
                            @error('value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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

@section('js')
@endsection
