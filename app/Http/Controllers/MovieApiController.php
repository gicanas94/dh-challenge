<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Http\Requests\EditMovie;

class MovieApiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $movies = $request->title ? Movie::where('title', 'like', "%$request->title%")
                                    ->orderBy('title', 'asc')
                                    ->get() :
                                    Movie::orderBy('title', 'asc')->get();

        foreach ($movies as $movie) {
            $movie->genre;
        }

        return $movies;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Movie::create($request[0]->all());

        return response()->json(null, 204);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Movie::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        $movie->fill($request[0]->all())->save();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Movie::find($id)->delete();

        return response()->json(null, 204);
    }
}
