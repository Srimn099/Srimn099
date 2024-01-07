@extends('templates/dashboard')
@section('content')
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Post Categories</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <form action="/dashboard/categories/{{ $category->slug }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="text-decoration-none text-warning mx-2 d-inline"><i class="fas fa-pencil-alt"></i></a>
                            <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
