<?php
/*
Crea un array de dos dimensiones (matriz) que contenga números y cadenas solicitados al usuario, muestra por pantalla los elementos cadena que se encuentren en posiciones fila par y columna impar.
´´´

1 Hola 3

Adiós 3 2 -> Muestra Hola y Manzana

4 Manzana 5

´´´

Crea un array a partir de las siguientes instrucciones:
El tamaño es solicitado al usuario.
Elemento1: 1
Elemento2: 1
ElementoN: ElementoN-1 + ElementoN-2
Solicita al usuario un array de máximo 10 números reales y calcula su media.

La ametralladora con mayor producción durante la Primera Guerra Mundial, la Chauchat fue la primera de este tipo de armas lo suficientemente ligera como para poder ser operada por un sólo soldado, incluso para disparar desde la cintura en marcha. Utilizada por los ejércitos franceses así como por los norteamericanos, estos últimos desvelaron una serie de fallos que la convirtieron también en probablemente la peor ametralladora de la historia.

Sus principales problemas eran:

El cargador estaba abierto por un lado y el lodo bloqueaba el mecanismo, haciéndola inservible.

Se calentaba demasiado, por lo que se recomendaba a los soldados disparar solamente en ráfagas cortas.

Nuestro ejercicio, será hacer una Chauchat virtual, que reproduzca su comportamiento.

1. Por un lado tendrás que crear una variable cargador donde habrá de guardar unos 7 "pium!"

2. El otro elemento será nuestra chauchat, que "hace cosas", y será al que le hay que pasar el cargador para que haga cosas.

```
chauchat(cargador)
```

3. Cuando ejecutemos dicho código, veremos impresos todos los "pium!" del cargador, uno tras otro.

Por ejemplo, en el caso de 3 "pium!" en el cargador, veremos en la consola:

```
pium!
pium!
pium!

```

Representaremos los 2 principales problemas:

4. Al tener el cargador abierto, era posible que se bloquease si algo entraba, como una "ramita".

Digamos que existe un 80% de probabilidad de que se quede "pillada":

Si se queda pillada, no habrá tiros y sólo mostrará un mensaje: "Illo, me he quedao pillá!"
NOTA:  Recuerda que hay una función predefinida que genera números random.

5. Para evitar que se caliente y se bloquee, cada 3 disparos se imprimirá un espacio:

```

    pium!
    pium!
    pium!

    pium!
    pium!
    pium!

    pium!
    pium!
    pium!

```
Sabiendo que la función file_put_contents escribe en un fichero:
Investiga un poco sobre la función file_put_contents. ¿Qué parámetros necesitamos pasarle a la función? ¿Qué devuelve?

Crea un fichero json con los siguientes datos de los clientes:

nombre completo
email
localidad
telefono
número de pedido
Recupera los datos del fichero json de clientes y muéstralos por pantalla.
*/
?>