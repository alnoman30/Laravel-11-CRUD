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
                <a href="{{ route('home')}}" class="btn btn-success">Go Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">          
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Create Products</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="name" class="form-label h5">Name</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                              @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="" class="form-label h5">Description</label>
                                <textarea placeholder="" class="form-control" name="description" cols="30" rows="5" >{{ old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              </div>


                            <div class="mb-3">
                                <label for="sku" class="form-label h5">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku')}}">
                                @error('sku')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              </div>

                              <div class="mb-3">
                                <label for="price" class="form-label h5">Price</label>
                                <input type="in" class="form-control" id="price" name="price" value="{{ old('price')}}">
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              </div>

                              <div class="mb-3">
                                <label for="name" class="form-label h5">Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="Price" name="image">
                              </div>


                              <div class="d-grid">
                                <button class="btn btn-lg btn-dark">Submit</button>
                            </div>
                          </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>

