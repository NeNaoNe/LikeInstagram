@extends('layouts.app')

@section('title', 'Admin: Edit Categories')


@section('content')
<form action="{{ route('admin.categories.update', $category->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="card-header border w-50">
        <div>
            <h1 class="h3 fw-bold text-center">Update Category</h1>

            {{-- display categories --}}
            {{-- @foreach ($all_categories as $category)
            <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
    @endforeach
    @error('category')
        <p class="text-danger small">{{ $message }}</p>
    @enderror --}}
        </div>
    </div>
    <div class="card-body border mb-5 w-50">
        <div class="mb-3">
            <label for="category_name" class="form-label text-muted">Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Enter category name here"
            value="{{ old('category_name', $category->name) }}" autofocus>
            @error('category_name')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_slug" class="form-label text-muted">Category Slug</label>
            <input type="text" name="category_slug" class="form-control" placeholder="Enter category slug here"
            value="{{ old('category_slug', $category->slug) }}"  autofocus>
            @error('category_slug')
                <p class="text-danger small">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary px-5 ">Update</button>
    </div>
</form>
@endsection
