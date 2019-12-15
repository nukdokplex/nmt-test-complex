<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script type="application/javascript">
        var __token = "{{csrf_token()}}";
    </script>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    @include('layouts.partials.requirements')
    @include('layouts.partials.dynamic_styles')
    @yield("head")
</head>
<body>
@yield('content')
</body>
</html>
