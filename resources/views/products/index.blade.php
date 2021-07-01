<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products App</title>

    <!-- Style -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h3 class="text-muted">Products List</h3>
            </div>
            <div class="col-md-10 d-flex mt-5">
                <!-- Search with Price -->
                <form class="col-md-5 d-flex justify-content-center" action="/searchWithPrice" method="GET">
                    <input name="search" type="text" class="form-control w-50" placeholder="Search with Price...">
                    <button class="btn btn-primary rounded-circle mx-2 h-auto" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
                <!-- Search with Price -->
                <form class="col-md-5 d-flex justify-content-center" action="/searchWithCategory" method="GET">
                    <select class="form-control w-50" name="category" id="category">
                        @foreach (App\Models\Category::all() as $category)   
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary rounded-circle mx-2 h-auto" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
            <table class="table table-hover mt-3">
                <thead>
                    <tr class="bg-success">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <img class="rounded-circle" style="width: 50px;height: 50px;" src="{{ $product->image }}" alt="">
                            </td>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</body>
</html>