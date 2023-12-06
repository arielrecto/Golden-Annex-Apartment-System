<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>{{ $title }}</title>


    <style>
        @page{
            margin: 0;
        }
    </style>
</head>

<body>


    <div class="container mt-5">
        <h2 class="text-center mb-3">Golden Annex Apartment - bill ({{$month}})</h2>
        {{-- <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('#') }}">Export to PDF</a>
        </div> --}}

        <h4 class="font-weight-bold text-capitalize text-sm">Total : {{$total}}</h4>
        <table class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th></th>
                    <th>Room #</th>
                    <th>name</th>
                    <th>metric type</th>
                    <th>previous reading</th>
                    <th>current reading</th>
                    <th>reading</th>
                    <th>rate</th>
                    <th>amount</th>
                    <th>status</th>
                    <th>balance</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <th>{{ $bill->id }}</th>
                        <th>{{$bill->room->room_number}}</th>
                        <td>{{ $bill->name }}</td>
                        <td>{{ $bill->metric_type ?? '-' }}</td>
                        <td>{{ $bill->previous_reading ?? '-' }}</td>
                        <td>{{ $bill->current_reading ?? '-' }}</td>
                        <td>{{ $bill->reading ?? '-' }}</td>
                        <td>{{ $bill->metric_rate ?? '-' }}</td>
                        <td>{{ $bill->amount }}</td>
                        <td>{{ $bill->status }}</td>
                        <td>{{ $bill->balance }}</td>
                        <td>{{ $bill->due_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
