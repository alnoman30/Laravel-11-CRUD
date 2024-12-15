<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Laravel 11 CRUD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Laravel 11 CRUD</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-between">
                <h5 style="font-family: Dancing Script, cursive;font-size:26px;">SHOP</h5>
                <div>
                    <a href="{{ route('create')}}" class="btn btn-danger">Logout</a>
                    <a href="{{ route('create')}}" class="btn btn-dark">Create</a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">          
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>

                                @foreach ( $products as $product )
                                <tr>
                                    <td>{{ $product->id}}</td>
                                    <td><img src="uploads/{{$product->image }}" alt="" width="80px"></td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->description}}</td>
                                    <td>{{ $product->sku}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('edit', $product->id)}}" class="btn btn-dark me-2">Edit</a>
                                            <form method="post" action="{{ route('delete',$product->id )}}" >
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>

