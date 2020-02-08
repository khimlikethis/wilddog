<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.meta')
    <link rel="icon" href="images/favicon.ico" type="image/ico"/>
    <title>Wilddog</title>
    @include('layouts.header')
</head>
<div>
    @include('layouts.sidebar')
    <div class="container">
        @yield('content')
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
</div>
</div>

@include('layouts.script')
@yield('script')
</body>
</html>
