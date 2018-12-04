<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $dispatcher;

    /**
     * Constructor function with Dingo dispatcher.
     */
    public function __construct()
    {
        $this->dispatcher = app('Dingo\Api\Dispatcher');
    }

    /**
     * Return search view with the list of movies.
     */
    public function returnView(Request $request)
    {
        $searchQuery = $request->input('title');
        $movies = collect($this->dispatcher->get('movies', ['title' => $searchQuery]));

        if ($movies->isEmpty()) {
            $error = [];
            $error['type'] = 'warning';
            $error['message'] = trans('messages.search-error');

            return view('search', compact('error', 'searchQuery'));
        } else {
            return view('search', compact('movies', 'searchQuery'));
        }
    }
}
