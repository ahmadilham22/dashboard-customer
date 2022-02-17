@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>@lang('app.operational.operational')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">@lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="#">@lang('app.operational.server')</a></div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>@lang('app.list_of') @lang('app.operational.server')</h4>
              </div>
              <div class="card-body">
                <div class="float-left d-flex">
                    <a href="{{ route('operational.server.create') }}" class="btn btn-primary">Add @lang('app.operational.server')</a>
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
                      <th>Network Number</th>
                      <th>Server Name</th>
                      <th>IP Public</th>
                      <th>IP Private</th>
                      <th>Hardisk Capacity Total</th>
                      <th>Hardisk Capacity Use</th>
                      <th>Hardisk Capacity Left</th>
                      <th>Processor</th>
                      <th>Core CPU</th>
                      <th>Total RAM</th>
                      <th>RAM Use</th>
                      <th>RAM Left</th>
                      <th>OS</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>SSH Port</th>
                      <th>Status</th>
                      <th>Time Zone</th>
                      <th>Up Time</th>
                      <th>Port Monitoring</th>
                      <th>Tipe Server</th>
                      <th>Owner</th>
                      <th>GPU Status</th>
                      <th>GPU Type</th>
                      <th>GPU Capacity</th>
                      <th>#</th>
                    </tr>
                    @forelse ($server as $item)
                    <tr>
                        <td>{{ (($server->currentPage()-1) * $server->perPage()) + $loop->iteration }}</td>
                        <td>{{$item->network_number}}</td>
                        <td>{{$item->server_name}}</td>
                        <td>{{$item->ip_public}}</td>
                        <td>{{$item->ip_private}}</td>
                        <td>{{$item->hardisk_capacity_total}}</td>
                        <td>{{$item->hardisk_capacity_use}}</td>
                        <td>{{$item->hardisk_capacity_left}}</td>
                        <td>{{$item->processor}}</td>
                        <td>{{$item->jumlah_core}}</td>
                        <td>{{$item->total_ram}}</td>
                        <td>{{$item->ram_terpakai}}</td>
                        <td>{{$item->sisa_ram}}</td>
                        <td>{{$item->operating_system}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->password}}</td>
                        <td>{{$item->ssh_port}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->time_zone}}</td>
                        <td>{{$item->up_time}}</td>
                        <td>{{$item->port_monitoring}}</td>
                        <td>{{$item->tipe_server}}</td>
                        <td>{{$item->owner}}</td>
                        <td>{{$item->ada_gpu}}</td>
                        <td>{{$item->nama_gpu}}</td>
                        <td>{{$item->jenis_gpu}}</td>
                        <td>{{$item->kapasitas_gpu}}</td>
                        <td>
                            <a href="{{ route('operational.server.show', $item->id_server) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Show Data Server"> <span class="fa fa-eye"></span></a>
                            <a href="{{ route('operational.server.edit', $item->id_server) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Server"> <span class="fa fa-edit"></span></a>
                            <span data-title="{{ $item->name }}" href="{{ route('operational.server.destroy', $item->id_server) }}" class="btn btn-sm btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Delete Server"> <span class="fa fa-trash"></span></span>
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