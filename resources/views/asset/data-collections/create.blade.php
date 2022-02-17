@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('asset.data-collections.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Add Data Collection</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.data-collections.index') }}">Data Collections</a></div>
          <div class="breadcrumb-item">Add Data Collection</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>New Data Collection</h4>
              </div>
              <div class="card-body">
                <form class="form" action="{{ route('asset.data-collections.store') }}" method="POST">
                    @csrf
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.name')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror form-control" required="">
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
                            <input type="text" value="{{ old('description') }}" name="description" class="@error('description') is-invalid @enderror form-control">
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.source')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('source') }}" name="source" class="@error('source') is-invalid @enderror form-control">
                           {{--  <select class="form-control select2" multiple="multiple" name="source" required="">
                                @foreach($sources as $source)
                                <option>{{$source}}</option>
                                @endforeach
                            </select> --}}
                            @error('source')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.price_per_data')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" value="{{ old('price_per_data') }}" name="price_per_data" class="@error('price_per_data') is-invalid @enderror form-control">
                            @error('price_per_data')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">@lang('app.total_data')</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" value="{{ old('total_data') }}" name="total_data" class="@error('total_data') is-invalid @enderror form-control">
                            @error('total_data')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Value</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="number" value="{{ old('value') }}" name="value" class="@error('value') is-invalid @enderror form-control">
                            @error('value')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right"></label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <button type="submit" class="btn btn-primary">Save</button>
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
<script type="text/javascript">
    $(".select2").select2({
        tags:true
    });
</script>
@endsection
