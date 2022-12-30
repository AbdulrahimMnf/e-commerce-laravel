<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.components.layouts.head')
</head>

<body class="bg-light">

    @include('layouts.components.layouts.nav')

    <div class="container pt-4">
        @yield('content')
    </div>

    @include('layouts.components.layouts.js')

    @yield('scripts')

</body>
</html>
