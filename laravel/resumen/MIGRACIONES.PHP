<?php
/*
sE TIENE UNA MIGRACIÓN POR CADA TABLA EN ELLA SE DEFINE COMO CREARLA Y COMO MATARLA

*/
//Simplemente nos crea el archivo
php artisan make:migration nombre_migracion
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


//CREA UNA TABLA LLAMADA PRUEBA CON UN ID AUTOINCLEMEWNTEADO, UN EMAIUL TIPO STERING, UN COMMENT TIPOO STRING DE 55 QUE PUEDE SER NULLL Y FECHA Y HORA DE CREACIUÓN
class CrearTablaPrueba extends Migration{

    public function up(){
        Schema::create('prueba', function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('comment',255)->nullable();
            $table->timestamps();
        })
    }
    //MATAR UNA BD LLAMADA PRUEBA
    public function down(){
        Schema::drop('prueba');
    }
}

//SE LANZA
php artisan migrate
 //Para deshacer la última migración ejecutada y registrada en la base de datos
 php artisan migrate:rollback

 //Para deshacer todas las migraciones de la base de datos
 php artisan migrate:reset