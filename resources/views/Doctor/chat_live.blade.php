<!DOCTYPE html>
<html lang="en">

    <head>
        @include('Doctor.css')
        @livewireStyles
    </head>

    <body>
        @include('Doctor.nav')

        @auth
            @livewire('doctor-chat-component')
        @endauth

        <script src="{{asset("assets/js/jquery.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("assets/js/table.js")}}"></script>
        <script src="{{asset("assets/bootstrap/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("assets/js/app.js")}}"></script>
        <script src="{{asset("assets/js/Loading-Page-Animation-Style.js")}}"></script>
        <script src="{{asset('assets/js/new_chat.js')}}"></script>

        @livewireScripts

    </body>

</html>

