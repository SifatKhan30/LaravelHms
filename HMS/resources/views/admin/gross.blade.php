@extends('layouts.layout2')
@section('content')

<style>
    #chartdiv {
        width: 100%;
        height: 300px;
    }
</style>

<div class="card">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline" style="background-color:khaki">
                        <div class="row">
                            <div class="card-body col-md-10 offset-md-1" style="background-color: sandybrown;">
                                <!--Bar chart div to be applied here-->
                                <div id="chartdiv"></div>
                                <h2 style="text-align: center;">Gross Report</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0">Tabular Presentation</h5>
        </div>
            <div class="card-body">

                <div class="card-body" style="background-color:navajowhite">

                <table class="table table-bordered" style="background-color:khaki">
                    <thead>
                        <tr>
                            <th style="font-weight: 900">SL.</th>
                            <th style="font-weight: 900">Month</th>
                            <th style="font-weight: 900; text-align:center">Incomes</th>
                            <th style="font-weight: 900; text-align:center">Expenses</th>
                            <th style="font-weight: 900; text-align:center">Profit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($grossReport as $k=>$e)
                    
                    <tr>
                        <td>{{$k+1}}</td>
                        
                        <td>
                            @if(array_key_exists('expense', $e))
                            {{$e['expense']->month->month_name}}
                            @endif
                        </td>
                        <td style="text-align: right; color:blue">
                            @if(array_key_exists('payment', $e))
                            {{number_format($e['payment']+$e['food']+$e['service'],2)}}
                            @endif
                            </td>
                        <td style="text-align: right; color:red">
                            @if(array_key_exists('expense', $e))
                            {{number_format($e['expense']->tcost,2)}}
                        @endif
                        </td>
                        <td 
                        @if(($e['payment']+$e['food']+$e['service']-$e['expense']->tcost)> 0)
                        style="text-align: right; color: green"
                        @else style="text-align: right; color: red"
                        @endif
                        > 
                            @if(array_key_exists('payment', $e) && array_key_exists('expense', $e))
                            {{number_format($e['payment']+$e['food']+$e['service']-$e['expense']->tcost,2)}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
   
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );

        var data = [
         @foreach($grossReport as $k=>$e)
                {
                    "year": "{{ array_key_exists('expense', $e) ? $e['expense']->month->month_name : '' }}",
                    "Income": {{ array_key_exists('payment', $e) ? $e['payment'] + $e['food'] : 0 }},
                    "Expense":  {{ array_key_exists('expense', $e) ? $e['expense']->tcost : 0 }},

                },
        @endforeach
            
        ]


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xRenderer = am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.1,
            cellEndLocation: 0.9
        })

        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "year",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        }));

        xRenderer.grid.template.setAll({
            location: 1
        });

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {
                strokeOpacity: 0.1
            })
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: name,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: fieldName,
                categoryXField: "year"
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}:{valueY}",
                width: am5.percent(90),
                tooltipY: 0,
                strokeOpacity: 0
            });

            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function() {
                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true
                    })
                });
            });

            legend.data.push(series);
        }

        makeSeries("Income", "Income");
        makeSeries("Expense", "Expense");
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    }); // end am5.ready()
</script>