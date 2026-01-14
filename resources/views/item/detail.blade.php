@extends('template.template')

@section('content')
    <div class="container mt-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h4>{{ $data->item_name }}</h4>
                <span class="text-white">{{ $data->desc }}</span>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <div class="text-end mb-2">
                    {{-- button plus --}}
                    <form action="{{ route('item.delete', $data->slug) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addNew">
                            Edit
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin dihapus?')">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="my-2">
                    <p class="fw-bold">Item Name : </p>
                    <span class="text-muted">{{ $data->item_name }}</span>
                </div>
                <div class="my-2">
                    <p class="fw-bold">Category : </p>
                    <span class="text-muted">{{ $data->category->category_name }}</span>
                </div>
                <div class="my-2">
                    <p class="fw-bold">Stock : </p>
                    <span class="text-muted">{{ $data->stok }}</span>
                </div>
                <div class="my-2">
                    <p class="fw-bold">Description : </p>
                    <span class="text-muted">{{ $data->desc }}</span>
                </div>
                <div class="my-2">
                    <img src="{{ asset('storage/images/items/'.$data->image) }}" class="img-fluid w-full" width="300px" alt="image Item">
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit {{ $data->category_name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('category.update', $data->slug) }}" method="post">

                    @csrf
                    @method('put')

                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Category Name</label>
                            <input type="text" name="category_name" value="{{ $data->category_name }}"
                                class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="">Category Description</label>
                            <textarea name="desc" class="form-control">{{ $data->desc }}</textarea>
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
