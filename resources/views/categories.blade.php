{{-- @dd($post) --}}
@extends('templates/main')
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-6 text-center main-title">
            <h2 class="text-primary fw-bold">{{ $title }}</h2>
            <p>Look for some amazing post that might you need.</p>
            @include('templates/search')
        </div>
    </div>

    <div class="content mt-2">
        <div class="container">
            <div class="row d-flex">
                @foreach ($categories as $category)
                    <div class="col-4 mb-3">
                        <a href="/posts?category={{ $category->slug }}">
                            <div class="card bg-dark text-white border-0 shadow-sm">
                                <img src="https://source.unsplash.com/1200x600?{{ $category->name }}" class="card-img"
                                    alt="{{ $category->name }}">
                                <div class="card-img-overlay d-flex align-items-end p-0">
                                    <h5 class="card-title text-center flex-fill bg-primary mb-0 py-2">{{ $category->name }}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
