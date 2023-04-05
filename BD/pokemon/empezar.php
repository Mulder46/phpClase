<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "conexion.php";
    $pokeLista=mysqli_query($connection, "SELECT id,nombre FROM pokemon");
    $result_type=MYSQLI_ASSOC;
    $pokeArray=mysqli_fetch_all($pokeLista, $result_type);
    ?>

    <form action="PokeJuego.php" method="GET">
        <label for="lang">Elige pokemon</label>
        <select name="pokemon" id="pokemon">
          <?php 
          for($i=0;$i<count($pokeArray);$i++){
            echo '<option value='.$pokeArray[$i]['id'].'>'.$pokeArray[$i]["nombre"].'</option>';
          }
          ?>
          
        </select>
        <input type="submit" value="Enviar" />
  </form>

<?php mysqli_close($connection); ?>
</body>
</html>