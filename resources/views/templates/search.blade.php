<form action="/posts" class="d-flex">
    @if (request('category'))
    <input type="hidden" name="category" value="{{ request('category') }}">
    @endif

    @if (request('author'))
    <input type="hidden" name="author" value="{{ request('author') }}">
    @endif

    <input type="text" placeholder="Search" name="search" class="form-control me-2">
    <button class="btn" type="submit"><i class="fas fa-search text-white"></i></button>
</form>