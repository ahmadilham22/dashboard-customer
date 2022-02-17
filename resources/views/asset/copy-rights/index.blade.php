@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.copy_right')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.assets')</a></div>
          <div class="breadcrumb-item"><a href="#">@lang('app.copy_right')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.copy_right')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('asset.copy-rights.create') }}" class="btn btn-primary">Add @lang('app.copy_right')</a>
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
                      <th>@lang('app.no')</th>
                      <th>@lang('app.announced_date')</th>
                      <th>@lang('app.price')</th>
                      <th>@lang('app.expired_year')</th>
                      <th>@lang('app.amortization') (year)</th>
                      <th>@lang('app.current_value')</th>
                      <th>#</th>
                    </tr>
                    @forelse ($copy_rights as $item)
                    <tr>
                        <td>{{ (($copy_rights->currentPage()-1) * $copy_rights->perPage()) + $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->no }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->price_label }}</td>
                        <td>{{ ($item->year) ? $item->year.' Year' : '' }}</td>
                        <td>{{ $item->getAmortization()->amortization_label }}</td>
                        <td>{{ $item->getAmortization()->current_value_label }}</td>
                        <td>
                            {{-- <a href="{{ route('asset.copy_rights.show', $item) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Data Hak Cipta"> <span class="fa fa-eye"></span></a> --}}
                            <a href="{{ route('asset.copy-rights.edit', $item) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Hak Cipta"> <span class="fa fa-edit"></span></a>
                            <span data-title="{{ $item->name }}" href="{{ route('asset.copy-rights.destroy', $item) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Hak Cipta"> <span class="fa fa-trash"></span></span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" align="center">
                            @include('components.not-found-data')
                        </td>
                    </tr>
                    @endforelse
                  </table>
                </div>
                <div class="float-right">
                  {{ $copy_rights->links() }}
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