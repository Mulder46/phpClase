<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/plantilla.css"/>
    <title>Portfolio</title>
</head>
<body>
    <!--Portfolio 
    Nueva página, de nombre portfolio.html, en la que se deberán incluir como mínimo algunos elementos multimedia (imágenes, videos, audios).-->
    <?php include ('cabecera.html'); ?>
    <header>
        <h1>Porfolio </h1>
    </header>

    <section>
        <article>
            
                <h2>Imagenes</h2>
                <table>
                    <tr>
                        <td><div class="crecer">
                            <img src="images/cuant.jpg" alt="Fisica Cuántica" width="200" height="100">
                            <div class="pequenho">
                            <img src="images/cuant.jpg" alt="Bosones" width="600" height="400">
                            <h3>Física Cuántica</h3>
                            </div>
                            </div></td>
                        <td> <div class="crecer">
                            <img src="images/bosones.jpg" alt="Fisica Cuántica" width="200" height="100">
                            <div class="pequenho">
                            <img src="images/bosones.jpg" alt="Bosones" width="600" height="400">
                            <h3>Bosones</h3>
                        </div>
                        </div>
                        </div></td>
                    </tr>
                    <tr>
                        <td><div class="crecer">
                            <img src="images/arbol.png" alt="Fisica Cuántica" width="200" height="100">
                            <div class="pequenho">
                            <img src="images/arbol.png" alt="Bosones" width="400" height="600">
                            <h3>Videos Cuantum Fracture</h3>
                            </div>
                            </div></td>
                            <td> <div class="crecer">
                            <img src="images/colisionador.jpg" alt="Fisica Cuántica" width="200" height="100">
                            <div class="pequenho">
                            <img src="images/colisionador.jpg" alt="Bosones" width="600" height="400">
                            <h3>Gran colisionador de hadrones</h3>
                            </div>
                        </div>
                        </div></td>
                    </tr>
                </table>
                <h2>Videos</h2>
                <table>
                    <td>
                        <video width="320" height="240" controls>
                            <source src="video/mundo.mp4" type="video/mp4">
                        </video>
                        <h3>¿Que pasaría en mundo cuántico?</h3>
                    </td>
                        <td>
                            <video width="320" height="240" controls>
                                <source src="video/ITER.mp4" type="video/mp4">
                            </video>
                            <h3>¿Es el ITER tan peligroso?</h3>
                        </td>
                </table>

            <h2>Audios</h2>
            <table>
                <td>
                    <audio controls>
                        <source src="audio/Qubit.m4a" type="audio/mp4">
                      </audio>
                    <h3>¿Como se crea un Qubit?</h3>
                </td>
                <tr>
                    <td>
                        <audio controls>
                            <source src="audio/materiaOscura.m4a" type="audio/mp4">
                        </audio>
                        <h3>La materia oscura</h3>
                    </td>
                </tr>
            </table>
            
        </article>

        <footer>
            <hr>
            <h6>Propiedad de David,a todos los derechos cuánticos reservados</h6>
        </footer>
    </section>



</body>
</html>