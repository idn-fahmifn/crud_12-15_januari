<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Area Navbar --}}
    <nav class="navbar navbar-expand-lg bg-success-subtle">
        <div class="container">
            <a class="navbar-brand" href="#">My Items App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}"> 🏠 Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('category.index') }}"> 🏷️ Categories</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('item.index') }}"> 💼 Items</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}


    {{-- area content --}}
    @yield('content')
    {{-- end area --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
