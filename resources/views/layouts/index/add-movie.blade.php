@if (auth()->check() && auth()->user()->is_admin)
    <a href="{{ route('movies.create') }}" class="btn btn-outline-success font-weight-bold">
        {{ trans('messages.index-create-movie') }}
    </a>
@endif
