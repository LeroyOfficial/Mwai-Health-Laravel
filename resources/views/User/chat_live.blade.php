<!DOCTYPE html>
<html lang="en">

<head>
	@include('User.css')
    @livewireStyles
</head>

<body>
    @include('User.nav')

    @auth
        @livewire('chat-component')
    @endauth

    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
	<script src="{{asset("assets/js/jquery.dataTables.min.js")}}"></script>
	<script src="{{asset("assets/js/table.js")}}"></script>
    <script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/app.js")}}"></script>
    <script src="{{asset("assets/js/Loading-Page-Animation-Style.js")}}"></script>
    <script src="{{asset('assets/js/new_chat.js')}}"></script>

    @livewireScripts
    <script>
        document.addEventListener('livewire:load', function () {
            setInterval(function () {
                Livewire.emit('refreshComponent');

                var messageList = document.getElementById("messagelist");
                messageList.scrollTop = messageList.scrollHeight;
            }, 1000);
        });


    </script>
</body>

</html>

