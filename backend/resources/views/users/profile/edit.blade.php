@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="row justify-content-center">
        <div class="col-10">

            <div class="justify-content-md-center">
                <form action="{{ route('profile.update', $user->id) }}" method="post" class="ms-5 ps-5" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-3">
                            @if ($user->avatar)
                            <img src="{{ asset('/storage/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}" class="img-thumbnail avatar d-block mx-auto">
                            @else
                            <i class="far fa-user-circle fa-10x mt-5 pt-4 ms-5"></i>
                            @endif
                        </div>
                        <div class="col-6" style="margin-top: auto;">
                            <input name="avatar" type="file" class="form-control form-control-sm " style="width: auto;" />
                        </div>
                    </div>

                    <div class="row mb-3 mt-2">
                        <div class="col-sm-10">
                            <label for="name" class="text-end">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Name"
                                value="{{ old('name',$user->name) }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <label for="email" class="form-label text-end">E-Mail Address</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address"
                                value="{{ old('email',$user->email) }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <label for="self-intro" class="text-end">Self Introduction</label>
                            <textarea name="introduction" type="text" rows="3" class="form-control" id="introduction">{{ old('introduction',$user->introduction) }}</textarea>


                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
