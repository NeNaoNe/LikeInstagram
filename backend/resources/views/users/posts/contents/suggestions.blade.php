@if ($suggested_users)
    <div class=" fw-bold text-muted mb-2">Suggestions for you</div>
    <div class="row align-items-center mb-5 shadow-sm rounded-3
    ">
        @foreach ($suggested_users as $suggested_user)
            <div class="row">
                <div class="col-auto">
                    <a href="{{ route('profile.show', $suggested_user->id) }}" class="text-black-50">
                        @if ($suggested_user->avatar)
                            <img src="{{ asset('storage/avatars/' . $suggested_user->avatar) }}" class="rounded-circle" style="width: 2.4rem; height: 2.4rem; object-fit:cover" alt="">
                        @else
                             <i class="far fa-user-circle" style="font-size: 2.4rem;"></i>
                        @endif
                    </a>
                </div>
                <div class="col mt-2 ps-0 text-start">
                    <a href="{{ route('profile.show', $suggested_user->id) }}" class="text-body" style="text-decoration: none;">
                        <p class="fw-bold" style="font-size: 12px;">{{ $suggested_user->name }} </p>
                    </a>
                </div>
                <div class="col-auto pe-0 text-end" style="margin-top: 0.1rem;">
                    <form  action="{{ route('follow.store', $suggested_user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm"
                            style="font-size: .675rem">Follow</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endif
