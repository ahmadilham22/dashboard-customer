@extends('layouts.default')
@section('css')
<style type="text/css">
    .card-recent {
      height: 250px;
    }

    .text-small {
      font-size: 14px;
      line-height: 20px;
    }

    .anychart-credits-logo{
        display: none !Important;
    }

    .anychart-credits-text{
        display: none !Important;
    }
</style>
@endsection
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Customer</h1>
            </div>

            <!-- PRODUCT -->
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <a href="/users"><i class="fas fa-users"></i> </a>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Online Users</h4>
                          </div>
                          {{-- <div class="card-body">
                            {{number_format($product->count,0,",",".")}}<br>
                            <span class="text-muted float-right text-small">Rp. {{number_format($product->sum,0,",",".")}}</span>
                          </div> --}}
                        </div>
                      </div>
                    </div>

                    <!-- DATA COLLECTION -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <a href="/userstotal"><i class="fas fa-users"></i> </a>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Users</h4>
                          </div>
                          {{-- <div class="card-body">
                            {{number_format($product->count,0,",",".")}}<br>
                            <span class="text-muted float-right text-small">Rp. {{number_format($product->sum,0,",",".")}}</span>
                          </div> --}}
                        </div>
                      </div>
                    </div>

                    <!-- MODEL -->
                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <a href="/usersservices"><i class="fas fa-cogs"></i> </a>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Services</h4>
                          </div>
                          
                        </div>
                      </div>
                    </div> --}}
                    
                    <!-- COPY RIGHT -->
                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <a href="usersdatas"><i class="fas fa-database"></i> </a>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Users Data</h4>
                          </div>
                          
                        </div>
                      </div>
                    </div> --}}
          
                    <!-- SOFTWARE -->
                     {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12 ">
                      <div class="card card-statistic-1 justify-content-center">
                        <div class="card-icon bg-primary">
                          <a href="usersrevenue"><i class="fas fa-dollar-sign"></i> </a>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Revenue</h4>
                          </div>
                         
                        </div>
                      </div>
                    </div> --}}


                </div>

                
                
            </div>
        </section>
    </div>
@endsection

@section('js')
<script src="{{url('/')}}/plugin/anychart/anychart-bundle.min.js"></script>
<script type="text/javascript">
    $(function() {
        loadAllData()
        console.log(shortNumber(10000))
    })

    function loadAllData() {
        loadChartDataCollection()
        loadChartValuasi()
    }

    async function loadChartDataCollection() {
        let data = await getDataCollection();
        drawLineChart('data-collection', data.series);
    }

    async function loadChartValuasi() {
        let data = await getDataValuasi();
        drawColumnChart('valuasi', data.series);
    }

    function getDataCollection() {
        field = $('#filter-field').val()
        url = "{{ url('ajax/dashboard/chart-data-collection') }}"
        const result = $.ajax({
            url: url,
            cache: false,
            data:{field}
        });

        return result
    }

    function getDataValuasi() {
        url = "{{ url('ajax/dashboard/chart-valuasi') }}"
        const result = $.ajax({
            url: url,
            cache: false,
        });

        return result
    }

    function drawLineChart(element,series=[]){
        idChart = 'chart-'+element
        $('#'+idChart).remove()
        $('#card-'+element).append(`<div id="${idChart}" style="height: 200px"></div>`)
        var chart = anychart.fromJson({
            "chart": {
                "type": "line",
                "series":series,
                "container": idChart
            },
        });
        chart.legend(true).tooltip(true);
        chart.yAxis().labels().format(function() {
          var value = this.value;
          return shortNumber(value);
        });
        chart.draw();
    }

    function drawColumnChart(element, series=[]){
        idChart = 'chart-'+element
        $('#'+idChart).remove()
        $('#card-'+element).append(`<div id="${idChart}" style="height: 200px"></div>`)
        var chart = anychart.fromJson({
          "chart": {
            "type": "column",
            "series":series,
            "container": idChart
          }
        });
        chart.legend(true).tooltip(true);
        chart.yAxis().labels().format(function() {
          var value = this.value;
          return shortNumber(value);
        });
        chart.draw();
    }

    function shortNumber(num) 
    {
        units = ['', 'K', 'M', 'B', 'T'];
        for (i = 0; num >= 1000; i++) {
            num /= 1000;
        }
        return Math.round(num) + units[i];
    }
</script>
@endsection
