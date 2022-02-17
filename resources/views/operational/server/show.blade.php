@extends('layouts.default')

@section('content')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('operational.server.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail @lang('app.operational.operational')</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#"> @lang('app.operational.operational')</a></div>
          <div class="breadcrumb-item"><a href="{{ route('operational.server.index') }}"> @lang('app.operational.server')</a></div>
          <div class="breadcrumb-item">{{ $server->server_name }}</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data  @lang('app.operational.server')</h4>
              </div>
              <div class="card-body">
                <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Network Number</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('network_number') ?? $server->network_number}}" name="network_number" class="@error('network_number') is-invalid @enderror form-control" readonly>
                            @error('network_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Server Name</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('server_name') ?? $server->server_name }}" name="server_name" class="@error('server_name') is-invalid @enderror form-control" readonly>
                            @error('server_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">IP Public</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('ip_public') ?? $server->ip_public }}" name="ip_public" class="@error('ip_public') is-invalid @enderror form-control" readonly>
                            @error('ip_public')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">IP Private</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('ip_private') ?? $server->ip_private }}" name="ip_private" class="@error('ip_private') is-invalid @enderror form-control" readonly>
                            @error('ip_private')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Hardisk Capacity Total</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('hardisk_capacity_total') ?? $server->hardisk_capacity_total }}" name="hardisk_capacity_total" class="@error('hardisk_capacity_total') is-invalid @enderror form-control" readonly>
                            @error('hardisk_capacity_total')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Processor</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('processor') ?? $server->processor }}" name="processor" class="@error('processor') is-invalid @enderror form-control" readonly>
                            @error('processor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Core CPU</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('jumlah_core') ?? $server->jumlah_core }}" name="jumlah_core" class="@error('jumlah_core') is-invalid @enderror form-control" readonly>
                            @error('jumlah_core')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Total RAM</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('total_ram') ?? $server->total_ram }}" name="total_ram" class="@error('total_ram') is-invalid @enderror form-control" readonly>
                            @error('total_ram')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Operating System</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('operating_system') ?? $server->operating_system }}" name="operating_system" class="@error('operating_system') is-invalid @enderror form-control" readonly>
                            @error('operating_system')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Username</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('username') ?? $server->username }}" name="username" class="@error('username') is-invalid @enderror form-control" readonly>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Password</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('password') ?? $server->password }}" name="password" class="@error('password') is-invalid @enderror form-control" readonly>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">SSH Port</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('ssh_port') ?? $server->ssh_port }}" name="ssh_port" class="@error('ssh_port') is-invalid @enderror form-control" readonly>
                            @error('ssh_port')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Status</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('status') ?? $server->status }}" name="status" class="@error('status') is-invalid @enderror form-control" readonly>
                            @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Time Zone</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('time_zone') ?? $server->time_zone }}" name="time_zone" class="@error('time_zone') is-invalid @enderror form-control" readonly>
                            @error('time_zone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Port Monitoring</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('port_monitoring') ?? $server->port_monitoring }}" name="port_monitoring" class="@error('port_monitoring') is-invalid @enderror form-control" readonly>
                            @error('port_monitoring')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Server Type</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('tipe_server') ?? $server->tipe_server }}" name="tipe_server" class="@error('tipe_server') is-invalid @enderror form-control" readonly>
                            @error('tipe_server')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Owner</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('owner') ?? $server->owner }}" name="owner" class="@error('owner') is-invalid @enderror form-control" readonly>
                            @error('owner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">GPU Status</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('ada_gpu') ?? $server->ada_gpu }}" name="ada_gpu" class="@error('ada_gpu') is-invalid @enderror form-control" readonly>
                            @error('ada_gpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">GPU Name</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('nama_gpu') ?? $server->nama_gpu }}" name="nama_gpu" class="@error('nama_gpu') is-invalid @enderror form-control" readonly>
                            @error('nama_gpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">GPU Type</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('jenis_gpu') ?? $server->jenis_gpu }}" name="jenis_gpu" class="@error('jenis_gpu') is-invalid @enderror form-control" readonly>
                            @error('jenis_gpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">GPU Capacity</label>
                        <div class="col-sm-6 col-md-9 col-lg-6">
                            <input type="text" value="{{ old('kapasitas_gpu') ?? $server->kapasitas_gpu }}" name="kapasitas_gpu" class="@error('kapasitas_gpu') is-invalid @enderror form-control" readonly>
                            @error('kapasitas_gpu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
