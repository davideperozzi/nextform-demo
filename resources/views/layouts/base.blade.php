<!DOCTYPE html>
<html>
    <head>
        <title>Nextform Demo</title>

        <!-- Style -->
        <link rel="stylesheet" href="{{url('resources/style/css/application.css')}}" />
    </head>
    <body>
        @yield('content')

        <!-- Include js application -->
        @if (env('APP_DEBUG', true))
           <script src="{{url('resources/node_modules/google-closure-library/closure/goog/base.js')}}"></script>
           <script src="{{url('resources/javascript/gen/application.deps.js')}}"></script>
           <script type="text/javascript">goog.require('nextformdemo')</script>
        @else

        @endif

        <script>nextformdemo.bootstrap();</script>
    </body>
</html>