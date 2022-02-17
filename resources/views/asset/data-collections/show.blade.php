@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.data_collections')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Assets</a></div>
          <div class="breadcrumb-item"><a href="{{ route('asset.data-collections.index') }}">Data Collections</a></div>
          <div class="breadcrumb-item">Detail Data Collection</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Collection : {{ $dataCollection->name }}</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                </div>
                <div class="float-right">
                  <form action="" method="GET">
                    <div class="input-group">
                      <input type="text" class="form-control" name="search" placeholder="@lang('app.search')" value="{{ request()->search }}">
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
                      <th>@lang('app.date')</th>
                      <th>@lang('app.total_data')</th>
                      <th>@lang('app.new_data')</th>
                      <th>@lang('app.missing_data')</th>
                    </tr>
                    @forelse ($histories as $item)
                    <tr>
                        <td>{{ (($histories->currentPage()-1) * $histories->perPage()) + $loop->iteration }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->total_data_label }}</td>
                        <td>{{ $item->new_data_label }}</td>
                        <td>{{ $item->missing_data_label }}</td>
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
                  {{ $histories->links() }}
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
          title: "Are you sure will delete "+ title +" ?",
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
