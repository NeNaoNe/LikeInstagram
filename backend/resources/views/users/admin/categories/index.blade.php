@extends('layouts.app')

@section('title', 'Admin: Categories')


@section('content')


    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf
        <div class="card-header border w-50">
            <div>
                <h1 class="h3 fw-bold text-center">Create new Category</h1>

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
                    value="{{ old('category_name') }}" autofocus>
                @error('category_name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_slug" class="form-label text-muted">Category Slug</label>
                <input type="text" name="category_slug" class="form-control" placeholder="Enter category slug here"
                    value="{{ old('category_slug') }}" autofocus>
                @error('category_slug')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary px-5 ">Create</button>
        </div>
    </form>

    @if ($all_categories->isNotEmpty())
        <table class="table table-hover align-middle bg-white border text-secondary">
            <thead class="table-primary text-secondary small">
                <th></th>
                <th>CATEGORY</th>
                <th>SLUG</th>
                <th>CREATED AT</th>
                <th></th>
                <th></th>
                {{-- <th>STATUS</th>
            <th></th> --}}
            </thead>
            <tbody>
                @foreach ($all_categories as $category)
                    <tr>
                        <td class="text-center">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                                <div class="text-end">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i> Update</a>
                                </div>
                        </td>
                        <td>
                            <form action="{{ route('admin.categories.delete', $category->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif

@endsection
