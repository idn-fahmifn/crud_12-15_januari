@extends('template.template')

@section('content')

<div class="container mt-2">

<div class="my-4">
    <h2>Dashboard Overview</h2>
</div>

    <div class="row">
        <div class="col-md-6">
            <div class="card bg-success bg-opacity-25">
                <div class="card-body">
                    <h3>{{ $category }}</h3>
                    <p class="text-bold">Total categories</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-danger bg-opacity-25">
                <div class="card-body">
                    <h3>{{ $item }}</h3>
                    <p class="text-bold">Total items</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection