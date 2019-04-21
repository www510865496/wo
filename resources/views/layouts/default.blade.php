<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - 窝</title>
</head>
<body>
@include('layouts/_header')
<div class="container">
    <div class="offset-md-1 col-md-10">
        @yield('content')

        @include('layouts/_footer')
    </div>
</div>

</body>
</html>