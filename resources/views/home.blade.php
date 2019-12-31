@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                        <button type="button" onclick="sendEvent()" name="btn" id="btnClick">button
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('eb151ad38b3b95220795', {
                cluster: 'ap2',
                forceTLS: true
            });

            var channel = pusher.subscribe('register');
            channel.bind('demo.channel', function (data) {
                alert(JSON.stringify(data));
            });

            function sendEvent() {

                $.ajax({

                    url: '{{route('test-event')}}',
                    method: 'post',
                    data: {"_token": "{{ csrf_token() }}"},
                    success: function () {
                        console.log('dfsd');
                    }

                });
            }
        </script>


    </div>
@endsection
