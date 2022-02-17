@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.insights.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.edit') @lang('app.insights')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.insights.index') }}">@lang('app.insights')</a></div>
          <div class="breadcrumb-item">@lang('app.edit') {{ $insight->name }}</div>
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
                <form class="form" action="{{ route('asset.insights.update', $insight->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- NAME -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('name', $insight->name) }}" name="name" class="@error('name') is-invalid @enderror form-control">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- CATEGORY -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.category')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('category', $insight->category) }}" name="category" class="@error('category') is-invalid @enderror form-control">
                            @error('category')
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
                            <textarea name="description" class="@error('description') is-invalid @enderror form-control" row="3">{{ old('description', $insight->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- MONTH -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.month')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            @php
                                $month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                            @endphp
                            <select class="form-control" name="month" required="">
                                <option value="">-</option>
                                @foreach($month as $key => $item)
                                <option value="{{$key+1}}" {{ old('month', $insight->month) == $key+1 ? 'selected' : ''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            @error('month')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- YEAR -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.year')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <select class="form-control" name="year" required="">
                            <option value="">-</option>
                                @for($i = now()->format('Y'); $i >= 2000; $i--)
                                <option value="{{$i}}" {{ old('year', $insight->year) == $i ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                            @error('year')
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
                            <input type="file" value="{{ old('file', $insight->file) }}" name="file" class="@error('file') is-invalid @enderror form-control">
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
