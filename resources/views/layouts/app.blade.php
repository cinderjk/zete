<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ config('app.name') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-dashboard.css') }}" rel="stylesheet" />
    @livewireStyles()
    @if(config('app.env') == 'local')
    @vite('resources/js/app.js')
    @endif
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="{{ route('home') }}" class="simple-text logo-normal">
                    {{ config('app.name') }}
                </a>
            </div>
            @livewire('part.sidebar')
        </div>
        <div class="main-panel" id="main-panel">
            @livewire('part.navbar')
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                {{ $slot }}
            </div>
            @livewire('part.footer')
        </div>
    </div>
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js') }}" type="text/javascript"></script>
    <script>
        window.addEventListener('message', event => {
            // check if event is exits
            if(event.detail == undefined) return;
            $.notify({
                    // options
                    message: event.detail.message
                },{
                    // settings
                    type: event.detail.type,
                });
            });
    </script>
    @if (session()->has('message'))
        <script>
            $.notify({
                    // options
                    message: "{{ session('message') }}"
                },{
                    // settings
                    type: "{{ session('type') ?? 'success' }}",
                });
        </script>
    @endif
    @stack('scripts')
    @livewireScripts()
</body>

</html>