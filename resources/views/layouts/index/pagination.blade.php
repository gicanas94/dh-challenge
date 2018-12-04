<ul class="pagination">
    <li class="page-item {{ $movies->currentPage() === 1 ? 'disabled' : '' }}">
        <a
            class="page-link"
            href="{{ '/?page=' . ($movies->currentPage() - 1) }}">
            {{ trans('messages.index-pagination-previous') }}
        </a>
    </li>

    @for ($i = 1; $i <= $movies->lastPage(); $i++)
        <li class="page-item">
            <a
                class="page-link {{ $movies->currentPage() === $i ? 'active' : '' }}"
                href="{{ '/?page=' . $i }}">
                {{ $i }}
            </a>
        </li>
    @endfor

    <li class="page-item {{ $movies->currentPage() === $movies->lastPage() ? 'disabled' : '' }}">
        <a
            class="page-link"
            href="{{ '/?page=' . ($movies->currentPage() + 1) }}">
            {{ trans('messages.index-pagination-next') }}
        </a>
    </li>
</ul>
