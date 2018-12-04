@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        @if (isset($error))
            @include('layouts.index.error')
        @else
            @include('layouts.index.table')
            @include('layouts.index.add-movie')
        @endif
    </div>
@endsection
