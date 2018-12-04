@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        @if (isset($error))
            @include('layouts.index.error')
            @include('layouts.index.add-movie')
        @else
            @if (session('alert'))
                <div class="alert alert-{{ session('alert')['type'] }} text-center">
                    {!! session('alert')['type'] === 'danger' ?
                        '<span class="font-weight-bold">ERROR: </span>' :
                        ''
                    !!}

                    {!! session('alert')['message'] !!}
                </div>
            @endif

            @include('layouts.index.table', ['movies' => $paginatedMovies->items()])
            @include('layouts.index.add-movie')
            @include('layouts.index.pagination', ['movies' => $paginatedMovies])
        @endif
    </div>
@endsection
