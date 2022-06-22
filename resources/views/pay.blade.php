<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment page</title>

    <style>
        .j-form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 350px;
            height: 350px;
            border-radius: 10px;
            position: relative;
            margin: 0 auto;
            padding: 15px;
            background: #ccc;
            box-shadow: 4px 4px 0 rgba(0,0,0,.25);
        }
        .j-form input, .j-form select{
            height: 25px;
            width: 75%;
            margin: 15px;
            padding: 8px;
        }
        .j-form select{
            height: 35px;
        }
        .j-form input[type="submit"]{
            background: skyblue;
            font-weight: bold;
            width: 50%;
            height: 40px;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 2px 2px 0 rgba(0,0,0,.25);
        }
        .j-msg{
            width: 350px;
            height: 75px;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 4px 4px 0 rgba(0,0,0,.25);
            background: #ddd;
            text-align: center;
            margin: 0 auto 15px;
        }
        .j-msg span{
            margin-top: 25px;
            position: relative;
            display: block;
        }
        .j-link{
            display: block;
            margin: 15px auto;
            text-align: center;
        }
    </style>
</head>
<body>

    @if(session('msg'))
        <div class="j-msg">
            <span>{{session('msg')}}</span>
        </div>
    @endif

    <form action="" method="post" class="j-form">
        @csrf
        <h3>Add PayMe Sale:</h3>
        <input type="text" name ="name" id="name" placeholder="Sale name">
        <input type="number" name="amount" placeholder="Price">
        <select name="currency">
            @if(isset($currencies))
                @foreach ($currencies as $currency)
                    <option value="{{$currency->name}}|{{$currency->id}}">{{$currency->name}}</option>
                @endforeach
            @endif
        </select>
        <input type="submit" value="Add Payment">
    </form>

    <div class="j-link">
        <a href="sales">View all sales</a>
    </div>
</body>
</html>