@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.client')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="{{route('asset.clients.index')}}">@lang('app.client')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.client')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('asset.clients.create') }}" class="btn btn-primary">Add @lang('app.client')</a>
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
                      <th>@lang('app.email')</th>
                      <th>@lang('app.address')</th>
                      <th>#</th>
                    </tr>
                    @forelse ($clients as $item)
                    <tr>
                        <td>{{ (($clients->currentPage()-1) * $clients->perPage()) + $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('asset.clients.edit', $item) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit client"> <span class="fa fa-edit"></span></a>
                            <span data-title="{{ $item->name }}" href="{{ route('asset.clients.destroy', $item) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete client"> <span class="fa fa-trash"></span></span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" align="center">
                            @include('components.not-found-data')
                        </td>
                    </tr>
                    @endforelse
                  </table>
                </div>
                <div class="float-right">
                  {{ $clients->links() }}
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