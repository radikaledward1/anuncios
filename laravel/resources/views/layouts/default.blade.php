<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Layouts</title>
    @include('includes/css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
       $(document).ready(function () {

        (function ($) {

            $('#filtrar').keyup(function () {

                var rex = new RegExp($(this).val(), 'i');
                $('.buscar .anuncio').hide();
                $('.buscar .anuncio').filter(function () {
                    return rex.test($(this).text());
                }).show();

            })

        }(jQuery));

    });
</script>

</head>
<body>

    @include('includes/menu')

    @yield('content')

    @include('includes/js')

</body>
</html>



