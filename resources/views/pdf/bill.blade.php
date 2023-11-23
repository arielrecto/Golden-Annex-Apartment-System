<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <title>{{ $title }}</title>


    <style>
         .flex-container {
            display: flex;
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
        }
    </style>
</head>

<body>
    <h1 class="header">Golden Annex Apartment - bill</h1>
    <div class="parentCon">
        <div>
            <h1 class="c-con"> Name: {{ $bill->name }}</h1>
        </div>
        <div>
            <h1 class="c-con">Amount:  {{ $bill->amount }} pesos</h1>
        </div>
        <div>
            <h1 class="c-con"> Due Date : {{ $bill->due_date }}</h1>
        </div>
    </div>
</body>

</html>
