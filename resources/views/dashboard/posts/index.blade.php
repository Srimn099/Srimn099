@extends('templates/dashboard')
@section('content')
<div class="my-4 card border-0">
    <small class="text-muted text-center mt-2 mb-3">
        <span class="badge bg-primary text-white mb-3">All</span>
        <h3 class="text-dark">Post by {{ auth()->user()->name }}</h3>
    </small>
    <div class="table-responsive-md">
        <table id="example" class="table table-hover" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($posts->count())
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ date('d/F/Y', strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="text-decoration-none text-info"><i class="fas fa-eye"></i></a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none text-warning mx-2"><i class="fas fa-pencil-alt"></i></a>
                            <button class="text-decoration-none text-danger border-0 bg-transparent" id="btn-delete-post" data-slug="{{ $post->slug }}" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fas fa-times"></i></button>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6" class="pt-3"><p class="text-center">No post found.</p></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
