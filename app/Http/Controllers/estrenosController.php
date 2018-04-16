<?php

namespace App\Http\Controllers;

use App\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class estrenosController extends Controller
{
    function getEstrenos(){
        try{
            $peliculas = Pelicula::all();

            $respuesta = ["code" => "200","data" => $peliculas];
        }catch (Exception $e){
            $respuesta = ["code" => "500","data" => "Error al conectar al servidor"];
        }

        return Response::json($respuesta);
    }

    function getEstrenosfiltro($nombre){
        try{
            $peliculas = Pelicula::all()->where("nombre","like",$nombre);

            $respuesta = ["code" => "200","data" => $peliculas];
        }catch (Exception $e){
            $respuesta = ["code" => "500","data" => "Error al conectar al servidor"];
        }

        return Response::json($respuesta);
    }

    function addEstreno(Request $request){
        try{
            Pelicula::create([
                "nombre" => $request->name,
                "fechaEstreno" => $request->date,
                "imagen" => $request->image
            ]);

            $respuesta = ["code" => "200","data" => "Se agrego correctamente"];
        }catch (Exception $e){
            $respuesta = ["code" => "500","data" => "Error al conectar al servidor"];
        }
        return Response::json($respuesta);
    }

    function deleteEstreno($id){
        try{

            Pelicula::destroy($id);

            $respuesta = ["code" => "200","data" => "Se elimino correctamente"];
        }catch (Exception $e){
            $respuesta = ["code" => "500","data" => "Error al conectar al servidor"];
        }
        return Response::json($respuesta);
    }

    function updateEstreno(Request $request,$id){
        try{

            $pelicula = Pelicula::findOrFail($id);

            $pelicula->nombre=$request->name;
            $pelicula->fechaEstreno= $request->date;
            $pelicula->imagen=$request->image;

            $pelicula->save();
            $respuesta = ["code" => "200","data" => "Se actualizo correctamente"];
        }catch (Exception $e){
            $respuesta = ["code" => "500","data" => "Error al conectar al servidor"];
        }
        return Response::json($respuesta);
    }
}
