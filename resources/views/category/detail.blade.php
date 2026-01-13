@extends('template.template')

@section('content')
    <div class="container mt-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h4>{{ $data->category_name }}</h4>
                <span class="text-white">{{ $data->desc }}</span>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <div class="text-end mb-2">
                    {{-- button plus --}}
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addNew">
                        Edit
                    </button>

                    <button type="button" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Item Name</th>
                            <th>Stock</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td>
                                        <a href="{{ route('category.detail', $item->slug) }}" 
                                            class="btn btn-outline-success btn-sm">detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Item Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('category.store') }}" method="post">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Category Description</label>
                            <textarea name="desc" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
