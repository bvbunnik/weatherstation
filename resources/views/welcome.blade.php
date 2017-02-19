<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather Station Data</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        

        <style type="text/css">
            .table td {
                text-align: center;
            }
        </style>

    </head>
    <body>
    <div class="container-fluid">
        <h1>Data from weather station</h1>
        <div class="row">
            <div class="form-group">
                <form action="{{ url('/') }}" method="get" class="form-inline">
                <label for="period">Select period to display:</label>
                <select class="form-control" name="period" id="period">
                <option selected>Choose...</option>
                <option value="1h">1 hour</option>
                <option value="24h">24 hour</option>
                <option value="1w">1 week</option>
                <option value="all">All</option>
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div id="graphtemp" style="width:100%; height:400px;"></div>
        </div>
        <div class="row">
            <div id="graphhum" style="width:100%; height:400px;"></div>
        </div>
        <div class="row">
            <div id="graphvolt" style="width:100%; height:400px;"></div>
        </div>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script>
    $(function () { 
        Highcharts.chart('graphtemp', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Temperature'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis:{
                title: {
                    text: 'Temperature'
                }
            },
            series: [{
                name: 'Temperature',
                data: {!! $temp_data !!}
            }]
        });
        Highcharts.chart('graphhum', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Humidity'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis:{
                title: {
                    text: 'Humidity'
                }
            },
            series: [{
                name: 'Humidity',
                data: {!! $hum_data !!},
                color: '#90ed7d'
            }]
        });
        Highcharts.chart('graphvolt', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'Voltage'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis:{
                title: {
                    text: 'Voltage'
                }
            },
            series: [{
                name: 'Voltage',
                data: {!! $volt_data !!},
                color: '#f15c80'
            }]
        });
    });
    </script>
    </body>
</html>
