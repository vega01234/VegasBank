<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <input type="button" value="CLICK ME" onclick="ajax_test()">
    <div class="mostrar"></div>
    <script>
        function ajax_test(){

            // var parametros = {
            //     "nombre" : "FERNANDO",
            //     "apellido" : "VEGA", 
            //     "edad" : "17"
            // }

            $.ajax({
               
                // data: parametros,
                url: 'pt2.php',
                type: 'POST',

                beforeSend: function(){
                    $('.mostrar').html("Mostrar Mensaje Antes de Enviar");
                },
                
                success: function(mostrar_mensaje) {
                    $('.mostrar').html(mostrar_mensaje);
                }

            });

        }
    </script>
</body>
</html>