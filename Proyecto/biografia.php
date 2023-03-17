<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/plantilla.css"/>
    <title>Biografía</title>
</head>
<body>
    <!--Biografía
     es asi 
    Nueva página de nombre biografia.html. Su contenido estará conformado por texto y como mínimo una imagen.-->
    <?php include ('cabecera.html'); ?>
    <header>
        <h1>Biografía </h1>
    </header>
<section>
    <table class="biograf" >
        <tr>
            <td width=30%>
                <img src="images/foto.jpg" alt="Srodinger" width="180" height="200">
            </td>
            <td>
                <p>David León es un físico cuántico que se dedica a estudiar el proceso de medida y la naturaleza de los estados cuánticos1. Se inspira en las ideas de David Bohm, uno de los mejores físicos cuánticos de todos los tiempos2, y busca comprender la realidad desde una perspectiva holística y no determinista3. Ha publicado varios artículos y libros sobre sus investigaciones, y ha recibido numerosos premios y reconocimientos por su trabajo. Actualmente es profesor en la Universidad de Barcelona y dirige un grupo de investigación sobre física cuántica y filosofía.</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <details>
                    <summary>Datos Personales</summary>
                    <p>Nombre: David </p>
                    <p>Apellidos: Leon valle</p>
                    <p>Edad: Privado</p>
                </details>
            </td>
            
        </tr>
        <tr>
            <td colspan="3">
                <details>
                    <summary>Experiencia</summary>
                    <ol>
                        <li>
                            LHC
                        </li>
                        <li>
                            MIT
                        </li>
                        <li>
                            NASA
                        </li>
                     </ol>
                </details>
            </td>
        </tr>
    </table>
</section>

</body>
</html>