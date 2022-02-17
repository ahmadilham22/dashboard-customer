@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.insights')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="#">@lang('app.insights')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.insights')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('asset.insights.create') }}" class="btn btn-primary">Add @lang('app.insights')</a>
                </div>
                <div class="float-right">
                  <form action="" method="GET">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->search }}">
                      <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>@lang('app.name')</th>
                      <th>@lang('app.category')</th>
                      <th>@lang('app.description')</th>
                      <th>@lang('app.month')</th>
                      <th>@lang('app.file')</th>
                      <th>@lang('app.year')</th>
                      <th>Opsi</th>
                    </tr>
                    @forelse ($insights as $item)
                    <tr>
                        <td>{{ (($insights->currentPage()-1) * $insights->perPage()) + $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->month }}</td>
                        <td><a href="{{$item->url_file}}" target="_blank">{{ $item->file }}</a></td>
                        <td>{{ $item->year }}</td>
                        <td>
                            <a href="{{ route('asset.insights.show', $item) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Insight"> <span class="fa fa-eye"></span></a>
                            <a href="{{ route('asset.insights.edit', $item) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Insight"> <span class="fa fa-edit"></span></a>
                            <span data-title="{{ $item->name }}" href="{{ route('asset.insights.destroy', $item) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Insight"> <span class="fa fa-trash"></span></span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" align="center">
                            @include('components.not-found-data')
                        </td>
                    </tr>
                    @endforelse
                  </table>
                </div>
                <div class="float-right">
                  {{ $insights->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<form action="" method="POST" id="deleteForm">
    @csrf
    @method('DELETE')
    <input type="submit" style="display: none;">
</form>
@endsection

@section('js')

<script type="text/javascript">
    $('.btn-delete').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');
        swal({
          title: "Are you sure will delete data "+ title +" ?",
          text: "Once deleted the data cannot be restored !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $('#deleteForm').attr('action', href);
            $('#deleteForm').submit();
          }
        });
    });
    </script>
@endsection