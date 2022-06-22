<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sales</title>
</head>
<body>
    <table>
        <tr>
            <th>Time</th>
            <th>Sale Number</th>
            <th>Description</th>
            <th>Amount</th>
            <th>Currency</th>
        </tr>

        @foreach ($sales as $sale)
            <tr>
                <td>{{$sale->created_at}}</td>
                <td><a href="{{$sale->api_sale_url}}" target="_blank">{{$sale->api_sale_code}}</a></td>
                <td>{{$sale->name}}</td>
                <td>{{$sale->price}}</td>
                <td>{{$sale->currencie_id}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>