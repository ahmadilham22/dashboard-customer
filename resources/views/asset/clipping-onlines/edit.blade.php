@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.clipping-onlines.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>@lang('app.edit') @lang('app.clipping_online')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.clipping-onlines.index') }}">@lang('app.clipping_online')</a></div>
          <div class="breadcrumb-item">@lang('app.edit') @lang('app.clipping_online') {{ optional($clippingOnline->client)->name }}</div>
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
                <form class="form" action="{{ route('asset.clipping-onlines.update', $clippingOnline->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- CLIENT NAME -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.client_name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <select class="form-control select2" name="client_id" required="">
                                <option value="">-</option>
                                @foreach($clients as $key => $item)
                                <option value="{{$item->id}}" {{ old('client_id', $clippingOnline->client_id) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('client_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- DATE NEWS -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.date_news')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('date_news', $clippingOnline->date_news) }}" name="date_news" class="@error('date_news') is-invalid @enderror form-control daterange-picker" required="">
                            @error('date_news')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- DATE -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.date')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('date', $clippingOnline->date) }}" name="date" class="@error('date') is-invalid @enderror form-control datepicker" required="">
                            @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- CONTENT -->
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.content')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <textarea name="content" class="@error('content') is-invalid @enderror form-control summernote" row="15" required="">{{ old('content', $clippingOnline->content) }}</textarea>
                            @error('content')
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

@section('css')
<link rel="stylesheet" href="{{asset('stisla-2.2.0/dist')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="{{asset('stisla-2.2.0/dist')}}/assets/modules/summernote/summernote-bs4.css">
@endsection

@section('js')
<script src="{{asset('stisla-2.2.0/dist')}}/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{asset('stisla-2.2.0/dist')}}/assets/modules/summernote/summernote-bs4.js"></script>
<script>
    $('.daterange-picker').daterangepicker({
        autoUpdateInput: false,
        locale: {format: 'YYYY-MM-DD'},
        ranges: {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
    }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format)+' - '+picker.endDate.format(picker.locale.format));
    });

    $(".summernote").summernote({
        dialogsInBody: true,
        minHeight: 250,
    });
  </script>
@endsection
