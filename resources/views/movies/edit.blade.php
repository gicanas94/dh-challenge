@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-danger">
                <span class="font-weight-bold">ERROR: </span>
                {!! session('error') !!}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">{{ trans('messages.edit-header') }}</div>

                    <div class="card-body">
                        <form action="{{ route('movies.update', $movie['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title" class="text-md-right">
                                        {{ trans('messages.edit-form-title') }}
                                    </label>

                                    <input
                                        id="title"
                                        type="text"
                                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                        name="title"
                                        value="{{ old('title', $movie['title']) }}"
                                        autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @else
                                        <small class="form-text text-muted">
                                            {{ trans('messages.edit-form-required') }}
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="rating" class="text-md-right">
                                        {{ trans('messages.edit-form-rating') }}
                                    </label>

                                    <input
                                        id="rating"
                                        type="number"
                                        class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}"
                                        name="rating"
                                        value="{{ old('rating', $movie['rating']) }}"
                                        min="0"
                                        step=".1">

                                    @if ($errors->has('rating'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('rating') }}</strong>
                                        </span>
                                    @else
                                        <small class="form-text text-muted">
                                            {{ trans('messages.edit-form-required') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="awards" class="text-md-right">
                                        {{ trans('messages.edit-form-awards') }}
                                    </label>

                                    <input
                                        id="awards"
                                        type="number"
                                        class="form-control {{ $errors->has('awards') ? 'is-invalid' : '' }}"
                                        name="awards"
                                        value="{{ old('awards', $movie['awards']) }}"
                                        min="0">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="release_date" class="text-md-right">
                                        {{ trans('messages.edit-form-release-date') }}
                                    </label>

                                    <input
                                        id="release_date"
                                        type="text"
                                        class="form-control {{ $errors->has('release_date') ? 'is-invalid' : '' }}"
                                        name="release_date"
                                        value="{{ old('release_date', date('d-m-Y', strtotime($movie['release_date']))) }}"
                                        placeholder="dd-mm-yyyy">

                                    @if ($errors->has('release_date'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('release_date') }}</strong>
                                        </span>
                                    @else
                                        <small class="form-text text-muted">
                                            {{ trans('messages.edit-form-required') }}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="length" class="text-md-right">
                                        {{ trans('messages.edit-form-length') }}
                                    </label>

                                    <input
                                        id="length"
                                        type="number"
                                        class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}"
                                        name="length"
                                        value="{{ old('length', $movie['length']) }}"
                                        min="0"
                                        placeholder="minutos">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="genre_id" class="text-md-right">
                                        {{ trans('messages.edit-form-genre') }}
                                    </label>

                                    <select id="genre_id" class="form-control" name="genre_id">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}"
                                                {{ $genre['id'] == (old('genre_id', $movie['genre_id'])) ? 'selected' : '' }}>

                                                {{ $genre['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="revenue" class="text-md-right">
                                        {{ trans('messages.edit-form-revenue') }}
                                    </label>

                                    <input
                                        id="revenue"
                                        type="text"
                                        class="form-control {{ $errors->has('revenue') ? 'is-invalid' : '' }}"
                                        name="revenue"
                                        value="{{ old('revenue', $movie['revenue']) }}">

                                    <small class="form-text text-muted">
                                        {!! trans('messages.edit-form-revenue-help') !!}
                                    </small>
                                </div>

                                <div class="form-group col-lg-6 text-right align-self-center mt-2">
                                    <div>
                                        <button type="submit" class="btn btn-primary font-weight-bold">
                                            {{ trans('messages.edit-form-submit') }}
                                        </button>

                                        <a href={{ route('index') }} class="btn btn-outline-primary font-weight-bold">
                                            {{ trans('messages.edit-form-back') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
