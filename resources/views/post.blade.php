{{-- @dd($post) --}}
@extends('templates/main')
@section('content')
    <div class="content my-4">
        <div class="row">
            <div class="col-lg-8 col-12 mb-3">
                <div class="card detail-post border-0 shadow-sm">
                    <div class="card-image">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid"
                                alt="{{ $post->title }}">
                        @else
                            <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                class="card-img-top img-fluid" alt="{{ $post->title }}">
                        @endif
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3">{{ $post->title }}</h3>
                        <div style="color: #707070">
                            <p class="card-text">{!! $post->content !!}</p>
                        </div>
                        <p class="card-text border-top pt-2 d-flex flex-wrap">
                            <small class="text-muted me-3"><i class="fas fa-calendar-alt me-1"></i> Last updated 3 mins
                                ago</small>
                            <small class="text-muted me-3">
                                <i class="fas fa-tag me-1"></i>
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none">{{ $post->category->name }}</a>
                            </small>
                            <small class="text-muted ms-auto">
                                <i class="fas fa-user me-1"></i>
                                <a href="/posts?author={{ $post->author->username }}"
                                    class="text-decoration-none">{{ $post->author->name }}</a>
                            </small>
                        </p>

                    </div>
                </div>
            </div>
            <div class="related-post col-lg-4 col-12 mb-3">
                <div class="card border-0 shadow-sm p-3">
                    <h3 class="logo-title">Related Post</h3>
                    @foreach ($categories as $category)
                        <div class="post border-bottom mt-2 mb-3 pb-1 d-flex">
                            <div class="caption-img">
                                @if ($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top img-fluid"
                                        alt="{{ $category->title }}">
                                @else
                                    <img src="https://source.unsplash.com/1200x600?{{ $category->category->name }}"
                                        class="card-img-top img-fluid" alt="{{ $post->title }}">
                                @endif
                            </div>
                            <div class="caption card-body">
                                <p class="card-text">
                                    <small class="text-muted">
                                        <a href="/posts?category={{ $category->category->slug }}"
                                            class="text-primary text-decoration-none">{{ $category->category->name }}</a> -
                                        {{ date('d/F/Y', strtotime($category->created_at)) }}
                                    </small>
                                </p>
                                <a href="/posts/{{ $category->slug }}" class="text-decoration-none">
                                    <h6 class="card-title text-dark">{{ $category->title }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
