<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootatrap.css')}}">
    <script defer src="{{asset('bootstrap/js/jquery.js')}}"></script>
    @livewireStyles
</head>
<body class="bg-white">
    @livewire('navbar')
    <div class="container">
        {{$slot}}
    </div>
    @livewireScripts
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    {{-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
     --}}
     <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

