<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>

        ul {
            margin: 0;
            padding: 0;
        }


        li {
            list-style: none;  
        }
        .user-wrapper, .message-wrapper {
            border: 1px solid #dddddd;
            overflow-y: auto;
        }

        .user-wrapper {
            height: 600px;
        }

        .user {
            cursor:pointer;
            padding: 5px 0;
            position: relative;  
        }

        .user:hover {
            background:#eeeeee;
        }

        .user:last-child {
            margin-bottom: 0;
        }

        .pending {
            position: absolute;
            left:13px;
            top: 9px;
            background: #b600ff;
            margin: 0;
            border-radius: 50%;
            width:18px;
            height: 18px;
            line-height: 18px;
            padding-left: 5px;
            color:#ffffff;
            font-size:12px;
        }

        .media-left {
            margin: 0 10px;
        }

        .media-left img {
            width: 64px;
            border-radius: 64px;
        }

        .media-body p{
            margin: 6px 0;
        }

        .message-wrapper {
            padding: 10px;
            height: 536px;
            background: #eeeeee;
        }

        .messages .message {
            margin-bottom: 15px;
        }

        .messages .message:last-child {
            margin-bottom: 0;
        }

        .received, .sent {
            width: 45%;
            padding: 3px 10px;
            border-radius: 10px;
        }

        .received {
            background: #ffffff;
        }

        .sent {
            background: #3bebff;
            float:right;
            text-align: right;
        }

        .message p {
            margin: 5px 0;
        }

        .date {
            color:#777777;
            font-size: 12px;
        }


        .active {
            background: #eeeeee;
        }

        input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin:15px 0 0 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            outline: none;
            border: 1px solid #cccccc;
        }

        input[type=text]:focus {
            border: 1px solid #aaaaaa;
        }

    </style>
</head>
<body>
    <div id="notifDiv"
    style="z-index:10000; display: none; background: green; font-weight: 450; width: 350px; position: fixed; top: 80%; left: 5%; color: white; padding: 5px 20px">
</div>
    @include('inc.header')
    @yield('content')
    @include('inc.footer')
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    @stack('scripts')


    <script>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function() {
            $('.user').click(function() {
                $('.user').removeClass('active');
                $(this).addClass('active');
                receiver_id = $(this).attr('id');
                $.ajax({
                    type:'GET',
                    url: 'message/' +receiver_id,
                    data: "",
                    cache: false,
                    success:function(data) {
                        $('#messages').html(data);
                        // alert(data);
                    }
                });
            });
        });
    </script>
</body>
</html>