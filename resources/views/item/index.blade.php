@extends('template.template')

@section('content')
    <div class="container mt-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h4>Items</h4>
                <span class="text-white">List of item from resources</span>
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="card">
            <div class="card-body">
                <div class="text-end mb-2">
                    {{-- button plus --}}
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addNew">
                        Add New
                    </button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success!</strong> {{ session('success') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Gagal!</strong>.
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Stok</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->category->category_name }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('item.detail', $item->slug) }}"
                                            class="btn btn-outline-success btn-sm">detail</a>
                                    </td>
                                </tr>
                            @empty
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Item</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                {{-- jika sebuah form terdapat file, maka tambahkan atribut berikut : --}}
                <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">
                        <div class="form-group my-2">
                            <label for="">Item Name</label>
                            <input type="text" name="item_name" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">-Choose Category-</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Stok</label>
                            <input type="number" name="stok" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control" required>
                        </div>
                        <div class="form-group my-2">
                            <label for="">Item Description</label>
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
