<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Genre::orderBy('id', 'asc')->get();
    }
}
