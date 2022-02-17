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
                <h1>Dashboard Customer</h1>
            </div>

            <!-- PRODUCT -->
            <div class="section-body">
                <div id="container" style="padding-right: 20px"></div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    
<script type="text/javascript">
    const categories = JSON.parse('{!! $categories !!}');
    const data = JSON.parse('{!! $values !!}');
    

    Highcharts.chart('container', {

        title: {
            text: 'Pertambahan Pengguna Perhari'
        },
        yAxis: {
            title: {
                text: 'Total Pengguna'
            }
        },
        xAxis: {
            categories
        },
        legend: {
           enabled: false
        },
        credits: {
           enabled: false
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                }
            }
        },
        series: [{
            data
        }],
        responsive: {
            rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
                }
            }
            }]
        }

    });

</script>
@endsection