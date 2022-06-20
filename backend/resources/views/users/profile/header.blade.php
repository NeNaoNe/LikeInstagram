<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <a href="{{ route('profile.show', $user->id) }}">
                <img src="{{ asset('/storage/avatars/' . $user->avatar) }}"
                    class="img-thumbnail rounded-circle d-block mx-auto profile-avatar" alt="{{ $user->avatar }}"
                    style="width: 200px;
                height: 200px; object-fit: cover;">
            </a>
        @else
            <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark">
                <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
            </a>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 d-inline">{{ $user->name }}</h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}">Edit profile</a>
                @else
                    @if ($user->isFollowed())
                        <form action="{{ route('follow.destroy', $user->id) }}" class="d-inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-bold">Unfollow</button>
                        </form>
                    @else
                        <form action="{{ route('follow.store', $user->id) }}" class="d-inline" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <a href="" class="text-decoration-none text-dark">
                    <strong>{{ $user->posts->count() }}</strong>
                    {{ $user->posts->count() == 1? 'Post' : 'Posts'}}
                </a>
            </div>
            <div class="col-auto">
                <a href="{{ route('profile.followers', $user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->followers->count() }}</strong>
                    {{ $user->followers->count() == 1? 'Follower' : 'Followers'}}
                </a>
            </div>
            <div class="col-auto">
                <a href="" class="text-decoration-none text-dark">
                    <strong>{{ $user->following->count() }}</strong> Following
                </a>
            </div>
        </div>
        <div class="row">
            <p class="fw-bold">{{ $user->introduction }}</p>
        </div>
    </div>
</div>
</div>
