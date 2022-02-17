@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.reports')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="#">@lang('app.reports')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.reports')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('asset.reports.create') }}" class="btn btn-primary">Add @lang('app.reports')</a>
                </div>
                <div class="float-right">
                  <form action="" method="GET">
                    <div class="input-group">
                      <select class="form-control mr-2" name="client_id" onchange="this.form.submit()">
                        <option value="">Semua Client</option>
                        @foreach($clients as $item)
                        <option value="{{$item->id}}" {{ request()->client_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                        @endforeach
                      </select>
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
                      <th>@lang('app.client_name')</th>
                      <th>@lang('app.type')</th>
                      <th>@lang('app.start_date')</th>
                      <th>@lang('app.end_date')</th>
                      <th>@lang('app.description')</th>
                      <th>@lang('app.file')</th>
                      <th>Opsi</th>
                    </tr>
                    @forelse ($reports as $item)
                    <tr>
                        <td>{{ (($reports->currentPage()-1) * $reports->perPage()) + $loop->iteration }}</td>
                        <td>{{ optional($item->client)->name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->description }}</td>
                        <td><a href="{{$item->url_file}}" target="_blank">{{ $item->file_name }}</a></td>
                        <td>
                            <a href="{{ route('asset.reports.show', $item) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Report"> <span class="fa fa-eye"></span></a>
                            <a href="{{ route('asset.reports.edit', $item) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Report"> <span class="fa fa-edit"></span></a>
                            <span data-title="" href="{{ route('asset.reports.destroy', $item) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Report"> <span class="fa fa-trash"></span></span>
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
                  {{ $reports->links() }}
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