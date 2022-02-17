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
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>

            <!-- PRODUCT -->
            <div class="section-body">
                

            <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
                
            </p>
            </figure>
            </div>
        </section>
    </div>
@endsection

@section('js')
     <script>
    Highcharts.chart("container", {
      chart: {
        type: "line",
      },
      title: {
        text: "Active Users",
      },
      
      xAxis: {
        categories: [
          "25 Jan 2022",
          "26 Jan 2022",
          "27 Jan 2022",
          "28 Jan 2022",
          "29 Jan 2022",
          "30 Jan 2022",
          "31 Jan 2022",
          "01 Feb 2022",
          "02 Feb 2022",
          "03 Feb 2022",
          "04 Feb 2022",
          "05 Feb 2022",
        ],
      },
      yAxis: {
        title: {
          text: "Total Data",
        },
      },
      plotOptions: {
        line: {
          dataLabels: {
            enabled: false,
          },
          enableMouseTracking: true,
        },
      },
      series: [
        {
          name: "Ilham",
          data: [100, 120, 130],
        },
        {
          name: "Naufal",
          data: [150, 105, 145],
        },
      ],
    });
  </script>
@endsection