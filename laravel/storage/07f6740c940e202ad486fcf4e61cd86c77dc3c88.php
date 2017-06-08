<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Layouts</title>
    <?php echo $__env->make('includes/css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

    <?php echo $__env->make('includes/menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('includes/js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>



