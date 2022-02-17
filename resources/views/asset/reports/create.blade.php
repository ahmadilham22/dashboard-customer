@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.reports.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.add') @lang('app.reports')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item">@lang('app.add') @lang('app.reports')</div>
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
                <form class="form" action="{{ route('asset.reports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- CLIENT NAME -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.client_name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <select class="form-control" name="client_id" required="">
                                <option value="">-</option>
                                @foreach($clients as $key => $item)
                                <option value="{{$item->id}}" {{ old('client_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- TYPE -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.type')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            @php
                                $types = ['daily','weekly','monthly','report','insidental'];
                            @endphp
                            <select class="form-control" name="type" required="">
                                <option value="">-</option>
                                @foreach($types as $key => $item)
                                <option value="{{$item}}" {{ old('type') == $item ? 'selected' : ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.description')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <textarea name="description" class="@error('description') is-invalid @enderror form-control" row="3">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- START DATE -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.start_date')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="date" value="{{ old('start_date') }}" name="start_date" class="@error('start_date') is-invalid @enderror form-control">
                            @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- END DATE -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.end_date')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="date" value="{{ old('end_date') }}" name="end_date" class="@error('end_date') is-invalid @enderror form-control">
                            @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- FILE -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.file')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="file" value="{{ old('file') }}" name="file" class="@error('file') is-invalid @enderror form-control">
                            @error('file')
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
