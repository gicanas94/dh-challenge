<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-center">
        <thead class="thead-dark">
            <th class="text-left">{{ trans('messages.table-th-title') }}</th>
            <th>{{ trans('messages.table-th-genre') }}</th>
            <th>{{ trans('messages.table-th-length') }}</th>
            <th>{{ trans('messages.table-th-release-date') }}</th>
            <th>{{ trans('messages.table-th-revenue') }}</th>
            @if (auth()->check() && auth()->user()->is_admin)
                <th>{{ trans('messages.table-th-actions') }}</th>
            @endif
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td class="text-left">{{ $movie['title'] }}</td>
                    <td>{{ !empty($movie['genre']) ? $movie['genre']['name'] : '-' }}</td>
                    <td>{{ !empty($movie['length']) ? $movie['length'] . 'm' : '-' }}</td>
                    <td>{{ date('d-m-Y', strtotime($movie['release_date'])) }}</td>
                    <td>{{ !empty($movie['revenue']) ?
                        '$' . number_format($movie['revenue'], 0, ',', '.') :
                        '-' }}
                    </td>
                    @if (auth()->check() && auth()->user()->is_admin)
                        <td>
                            <a href="{{ route('movies.edit', $movie['id']) }}" class="btn btn-sm btn-info border-dark">
                                {{ trans('messages.table-actions-edit') }}
                            </a>

                            <form class="d-inline-block"
                                action="{{ route('movies.delete', $movie['id']) }}"
                                method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" name="button" class="btn btn-sm btn-danger border-dark">
                                    {{ trans('messages.table-actions-delete') }}
                                </button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
