<?php

//EL MODEL ES ORM QUE LLVA DE SQL A UN OBJETO PHP
    protected $table = 'pasteles';
//ESTOS SE PUEDEN CAMBIAR POR FORMULARIO
protected $fillable = ['name','descripcion', 'category'];
//ESTOS ESTÁN PROTEGIDOS PARA QUE NO SE CAMBIE POR FORMULARIO
protected $guarded = ['status'];

