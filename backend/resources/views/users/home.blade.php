@extends('layouts.app')

@section('content')
    <div class="row gx-5">
        <div class="col-8">
            {{-- posts --}}

            @if ($all_posts->isNotEmpty())
                @foreach ($all_posts as $post)
                    @if ($post->user->isFollowed() || $post->user->id === Auth::user()->id)
                        <div class="card mb-3">
                            {{-- head --}}
                            @include('users.posts.contents.title')
                            {{-- body --}}
                            @include('users.posts.contents.body')
                        </div>
                    @endif
                @endforeach
            @else
                <div class="text-center">
                    <h2> Share photos </h2>
                    <p class="text-muted">When you share photos, they'll appear on your profile</p>
                    <a href="{{ route('post.create') }}" class="text-decoration-none">Share your Photos</a>
                </div>
            @endif
        </div>
        <div class="col-4">
            <div class="row align-items-center mb-5 shadow-sm rounded-3 py-3">
                <div class="col-auto">
                    @if (Auth::User()->avatar)
                        <a href="{{ route('profile.show', Auth::User()->id) }}">
                            <img src="{{ asset('storage/avatars/' . Auth::User()->avatar) }}" class="rounded-circle" style="width: 3.5rem; height: 3.5rem; object-fit:cover" alt="">
                    </a>
                    @else
                    <i class="far far-user-circle" style="font-size: 3.5rem;">
                    </i>
                    @endif
                </div>
                <div class="col ps-0">

                </div>
            </div>

            {{-- Suggestions --}}
           @include('users.posts.contents.suggestions')
        </div>
    </div>
@endsection
