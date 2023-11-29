<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <title>{{ $title }}</title>


    <style>
        /* .flex-container {
            display: flex;
            flex-wrap: wrap;
        }

        .flex-container > div {
            margin: 10px;
            padding: 20px;
            font-size: 30px;
        }
        .c-con{
            font-size: small;
            font-family: 'Courier New', Courier, monospace';
        }

        .header {
            width: 100vw;
            text-align: center;
            font-weight: bold;
            font-size: large;
        } */
    </style>
</head>

<body>
    <h1 class="header">Golden Annex Apartment - bill</h1>


    <table>
        <tr>
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
        <tr>
            <th>{{ $bill->id }}</th>
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

    </table>

    {{-- <div class="flex-container">
        <div>
            <h1 class="c-con"> Name: {{ $bill->name }}</h1>
        </div>

        @if ($bill->name !== 'rent')
        <div>
            <h1 class="c-con"> Metric Type: {{ $bill->metric_type ?? '-'}}</h1>
        </div>

        <div>
            <h1 class="c-con"> Previous Reading: {{ $bill->previous_reading ?? '-'}}</h1>
        </div>

        <div>
            <h1 class="c-con"> Current Reading: {{ $bill->current_reading ?? '-'}}</h1>
        </div>
        <div>
            <h1 class="c-con"> Reading: {{ $bill->reading ?? '-'}}</h1>
        </div>

        <div>
            <h1 class="c-con"> Metric Rate: {{ $bill->metric_rate ?? '-'}}</h1>
        </div>

        @endif

        <div>
            <h1 class="c-con">Amount:  {{ $bill->amount }} pesos</h1>
        </div>
        <div>
            <h1 class="c-con"> Due Date : {{ $bill->due_date }}</h1>
        </div>
    </div> --}}
</body>

</html>
