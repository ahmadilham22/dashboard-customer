@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.models.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.edit') @lang('app.model')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.models.index') }}">@lang('app.model')</a></div>
          <div class="breadcrumb-item">@lang('app.edit') {{ $model->name }}</div>
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
                <form class="form" action="{{ route('asset.models.update', $model->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('name', $model->name) }}" name="name" class="@error('name') is-invalid @enderror form-control">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <textarea name="description" class="@error('description') is-invalid @enderror form-control" row="3">{{ old('description', $model->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.url')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('url', $model->url) }}" name="url" class="@error('url') is-invalid @enderror form-control">
                            @error('url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.debit')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" step="0.01" value="{{ old('debit', $model->debit) }}" name="debit" class="@error('debit') is-invalid @enderror form-control">
                            @error('debit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.credit')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" step="0.01" value="{{ old('credit', $model->credit) }}" name="credit" class="@error('credit') is-invalid @enderror form-control">
                            @error('credit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.value')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" step="0.01" value="{{ old('value', $model->value) }}" name="value" class="@error('value') is-invalid @enderror form-control">
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
<script src="{{ asset('/stisla-2.2.0/dist/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script>
    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Pilih Foto",   // Default: Choose File
        label_selected: "Ganti Foto",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
  </script>
@endsection
