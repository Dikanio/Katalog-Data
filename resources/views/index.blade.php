 <!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Katalog') }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css')
</head>

<body>
    <div class="container"> 
        @include('inc.navbar')
        @include('inc.messages')
        
        <div class="panel-group">
            
        <div class="panel panel-success"> 
            <div class="panel-heading">
                <div class="panel-title">@yield('panel-title')</div>
            </div>

            <div class="panel-body">
                @yield('content')
            </div>
            
        </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>