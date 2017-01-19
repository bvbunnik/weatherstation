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
    </div>
    {!! var_dump($temp_data) !!}
    <div class="row">
        <div class="col">
            <table class="table table-sm table-responsive">
                <thead>
                    <tr><th>Date</th><th>Temperature</th><th>Humidity</th><th>Voltage</th></tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr><td>{{ $row->created_at }}</td><td>{{ $row->temperature }}</td><td>{{ $row->humidity }}</td><td>{{ $row->voltage }} </td></tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
