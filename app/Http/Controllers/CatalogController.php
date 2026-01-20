<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Movie;
use PhpParser\Node\Expr\FuncCall;



class CatalogController extends Controller
{

    /**
     * 
     */
    public function getIndex()
    {
        return view("catalog/index", ['movies' => Movie::all()]);
    }

    /**
     * 
     */
    public function getShow($id)
    {
        return view("catalog/show", ['movie' => Movie::findOrFail($id), 'id' => $id]);
    }

    /**
     * 
     */
    public function getCreate()
    {
        return view("catalog/create");
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        return view("catalog/edit", ['movie' => Movie::findOrFail($id), 'id' => $id]);
    }

    public function getUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2100',
            'director' => 'required|string|max:255',
            'poster' => 'required|url',
            'synopsis' => 'required|string',
        ], [
            'title.required' => 'El título es obligatorio',
            'year.required' => 'El año es obligatorio',
            'year.integer' => 'El año debe ser un número entero',
            'year.min' => 'El año debe ser posterior a 1900',
            'year.max' => 'El año no puede ser mayor a 2100',
            'director.required' => 'El director es obligatorio',
            'poster.required' => 'El póster es obligatorio',
            'poster.url' => 'El póster debe ser una URL válida',
            'synopsis.required' => 'El resumen es obligatorio',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return redirect()->route('catalog.show', $id);
    }


    public function getNewMovie(Request $request)
    {
        //Crear nueva pelicula insert DB
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2100',
            'director' => 'required|string|max:255',
            'poster' => 'required|url',
            'synopsis' => 'required|string',
        ], [
            'title.required' => 'El título es obligatorio',
            'year.required' => 'El año es obligatorio',
            'year.integer' => 'El año debe ser un número entero',
            'year.min' => 'El año debe ser posterior a 1900',
            'year.max' => 'El año no puede ser mayor a 2100',
            'director.required' => 'El director es obligatorio',
            'poster.required' => 'El póster es obligatorio',
            'poster.url' => 'El póster debe ser una URL válida',
            'synopsis.required' => 'El resumen es obligatorio',
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->year = $request->year;
        $movie->director = $request->director;
        $movie->poster = $request->poster;
        $movie->synopsis = $request->synopsis;
        $movie->save();
        return redirect()->route('catalog.show', $movie->id);

    }

    public function getRentMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = $request->rented = true;

        $movie->save();
        return redirect()->route('catalog.show', $movie->id);
    }

    public function getReturnMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = $request->rented = false;
        $movie->save();
        return redirect()->route('catalog.show', $movie->id);
    }
}
