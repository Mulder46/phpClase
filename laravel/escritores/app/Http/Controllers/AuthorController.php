<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Mostrar todos
     */
    public function index() {
        $autores = Author::all('name'); //llamo al modelo autor (agregado antes al use y cojo su name)

        return response()->json([
            "autor:" => $autores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate(['name'=> 'required']);
            echo $request->name;
                //Insertamos en la base de datos
                $author =  Author::create(['name'=>$request->name]); //Lamando al modelo y haciendo un create
               

                //devolver una respuesta
                return response()->json([
                    "result"=> $author
                ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $autor = Author::findOrFail($id); //nos pasan el autor por URL
        
        return response()->json([
            "result"=> $autor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
            //validar
            $request->validate(['name'=>'required']);

            //actualizo la base de datos
            $autor=Author::findOrFail($id);
            $autor->name = $request->name;
            $autor->save();
    
            return response()->json([
                "result"=> $autor
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $autor = Author::findOrFail($id)->delete();
        
        return response()->json([
            "result"=> $autor
        ]);
    }
}
