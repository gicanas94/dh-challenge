<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMovie;
use App\Http\Requests\EditMovie;

class MovieController extends Controller
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
     * Return the create movie view.
     */
    public function returnCreateView()
    {
        $genres = $this->dispatcher->get('genres');

        return view('movies.create', compact('genres'));
    }

    /**
     * Dispatch the store request to the API.
     */
    public function makeStoreRequest(CreateMovie $request)
    {
        $request->merge([
            'release_date' => date('Y-m-d H:i:s', strtotime($request->release_date))
        ]);

        try {
            $movie = $this->dispatcher->post('movies', [$request]);

            $alert = [];
            $alert['type'] = 'success';
            $alert['message'] = trans('messages.index-create-success');

            return redirect('/')->with('alert', $alert);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput($request->input());
        }
    }

    /**
     * Dispatch the call to get the specified movie to the API and return it with the view.
     */
    public function returnEditView($id)
    {
        $movie = $this->dispatcher->get('movies/' . $id);
        $genres = $this->dispatcher->get('genres');

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Dispatch the update request to the API.
     */
    public function makeUpdateRequest(EditMovie $request, $id)
    {
        $request->merge([
            'release_date' => date('Y-m-d H:i:s', strtotime($request->release_date))
        ]);

        try {
            $movie = $this->dispatcher->put('movies/' . $id, [$request, $id]);

            $alert = [];
            $alert['type'] = 'success';
            $alert['message'] = trans('messages.index-edit-success');

            return redirect('/')->with('alert', $alert);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput($request->input());
        }
    }

    /**
     * Dispatch the delete request to the API.
     */
    public function makeDeleteRequest($id)
    {
        $alert = [];

        try {
            $this->dispatcher->delete('movies/' . $id);

            $alert['type'] = 'success';
            $alert['message'] = trans('messages.index-delete-success');
        } catch (\Exception $e) {
            $alert['type'] = 'danger';
            $alert['message'] = $e->getMessage();
        }

        return redirect('/')->with('alert', $alert);
    }
}
