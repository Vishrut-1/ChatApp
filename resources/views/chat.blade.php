<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChatApp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
</head>

<body>
<h1 align="center">Chat Application</h1>
<div class="container" style="margin-left: 400px">
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <div class="card bg-warning">
                        <div class="card-body text-center">
                            <h5 class="card-title">Chats</h5>
                        </div>
                    </div>
                    <br>
                    <div class="form-group view">
                        @foreach($chat as $chats)
                            <div class="append">
                                <b>{{$chats->user->name}}</b><br>
                                {{$chats->message}}<br>&nbsp;
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <textarea class="card-text" cols="58" rows="3" id="message"></textarea>
            </div>
            <button type="button" name="addChat" class="btn btn-success addChat">Send
            </button>
        </div>
    </div>
</div>
</body>


<script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('eb151ad38b3b95220795', {
        cluster: 'ap2',
        forceTLS: true
    });

    var channel = pusher.subscribe('Chat');
    channel.bind('demo.message', function (data) {
        console.log(data);
        $('.view').append('<div class="append">' + data.user + ':' + data.message.message + '</div>');
    });

    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.addChat').click(function () {

            var message = $('#message').val();

            console.log(message);
            $.ajax({

                url: "{{route('AddChat')}}",
                data: {message: message, "_token": "{{ csrf_token() }}"},
                type: 'POST',
                dataType: 'json',
                success: function (data) {

                    console.log(data);
                }
            })

        })

    })

</script>
</html>
