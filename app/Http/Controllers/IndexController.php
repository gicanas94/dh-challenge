<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexController extends Controller
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
     * Return index view with the list of movies.
     */
    public function returnView()
    {
        $movies = collect($this->dispatcher->get('movies'));

        if ($movies->isEmpty()) {
            $error = [];
            $error['type'] = 'warning';
            $error['message'] = trans('messages.index-error');

            return view('index', compact('error'));
        } else {

            // Manual pagination
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $resultsPerPage = 7;
            $currentPageResults = $movies->slice(($currentPage - 1) * $resultsPerPage, $resultsPerPage)->all();
            $paginatedMovies = new LengthAwarePaginator($currentPageResults, count($movies), $resultsPerPage);

            return view('index', compact('paginatedMovies'));
        }
    }
}
