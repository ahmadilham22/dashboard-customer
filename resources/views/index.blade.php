@extends('layouts.default')
@section('css')
<style type="text/css">
    .card-recent {
      height: 250px;
    }
</style>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kazee Inventory</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div style="margin-top: 20vh">
                            <center>
                                <img src="{{ asset('images/logo-kazee.png') }}" style="width:300px;margin-bottom:35px">
                                <h2>
                                    PT. Kazee Digital Indonesia
                                </h2>
                                <hr>
                                <p style="font-size: 14pt">
                                    Aplikasi untuk managemen aset digital.
                                </p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
