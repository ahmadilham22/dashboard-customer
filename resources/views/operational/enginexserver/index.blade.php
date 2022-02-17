@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.operational.operational')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="#">@lang('app.operational.enginexserver')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.operational.enginexserver')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('operational.enginexserver.create') }}" class="btn btn-primary">Add @lang('app.operational.enginexserver')</a>
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
                      <th>@lang('app.operational.engine_name')</th>
                      <th>@lang('app.operational.server_name')</th>
                      <th>#</th>
                    </tr>
                    @forelse ($server as $item) 
                    <tr>
                        <td>{{ (($server->currentPage()-1) * $server->perPage()) + $loop->iteration }}</td>
                        <td><a href="{{route('operational.engine.show',$item->id_engine)}}">{{$item->engine->engine_name}}</a></td>
                        <td><a href="{{route('operational.server.show',$item->id_server)}}">{{$item->server->server_name}}</a></td>
                        <td>
                            {{-- <a href="{{ route('operational.server.show', $item->id_database) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Show Data Database"> <span class="fa fa-eye"></span></a> --}}
                            <a href="{{ route('operational.enginexserver.edit', $item->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Engine x Server"> <span class="fa fa-edit"></span></a>
                            <span data-title="{{ $item->name }}" href="{{ route('operational.enginexserver.destroy', $item->id) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Engine x Server"> <span class="fa fa-trash"></span></span>
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
                  {{ $server->links() }}
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