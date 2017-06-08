<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Layouts</title>
    @include('includes/css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

    @include('includes/menu')

    @yield('content')

    @include('includes/js')
</body>
</html>



