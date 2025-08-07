@extends('app')
@section('admin-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Subcategories /</span> List
        </h4>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Subcategories</h5>
                <a href="{{ route('subcategories.create') }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-plus"></i> Add Subcategory
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($subcategories as $index => $subcategory)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $subcategory->category->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this subcategory?')">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No subcategories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection 