@extends('frontend.layouts.app')

@section('content')
    <div class="contaniner">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">EXTRACCIÓN MINERAA</h3>
            </div>
            <div class="container">
                <div id="column">

                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')

<script>
// Create the chart
Highcharts.chart('column', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'DETALLE EXTRACCION MINERA'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Extraccion",
            colorByPoint: true,
            data: <?= $data ?>
        }
    ],
  
});

</script>



@endpush
