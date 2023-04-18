<?php
/*
*
**
*CONTROLADORES
*
*/

/*
GET: index, create, show, edit.
POST: store.
PUT: update.
DELETE: destroy.
*/
//CREACIÓN DE UN CONTROLADOR, ESTO VA EN LA TERMINAL
php artisan make:controller NombreController --resource  //app/Http/Controllers
 
//EN WEB.PHP

//AÑADIMOS LA DIRECCIÓN DEL CONTROLER QUE USAREMOS
use App\Http\Controllers\GetController;

//CON ESTO, SI DE LA RAIZ VAMOS A /GET PROYECTO.LOCAL/getMETODO ENTRA AL CONTROLADOR DE NOMBRE GETCONTROLER Y COGE LA FUNCIÓN INDEX

Route::get('getMETODO', [GetController::class, 'index']);

//EN EL CONTROLADOR LE DAMOS VALOR AL INDEX EN ESTE CASO 
public function index(){
    return "resopuesta Get";
}


//CON RUTAS
//En el fichero de rutas
Route::get('tienda/productos/{id}', [TiendaController::class, 'show']);

//En el controlador
public function show($id)
{
    return "Esto muestra un producto. Recibiendo $id";
}
//METODOS     
Route::delete() //BORRAR REGISTROS
Route::post() //ENVIAN DATOS NORMALMENTE DESDE FORMULARIO
Route::get() //IR AUN CONTROLADOR
