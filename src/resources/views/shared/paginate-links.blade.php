<div class="pagination justify-content-center">
    @if ($paginatedItems)
    {{ $paginatedItems->appends(['search' => request('search')])->links() }}

    @endif
</div>