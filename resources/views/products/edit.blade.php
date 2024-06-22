<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Product</title>
    @vite('resources/css/app.css')
    @vite('resources/css/register.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="item-menu">
                <a href="{{url('/list')}}">
                    <span class="icon"><i class="bi bi-table"></i></span>
                    <span class="txt-link">Products</span>
                </a>
            </li>            
            <li class="item-menu ativo">
                <a href="{{url('/create')}}">
                    <span class="icon"><i class="bi bi-plus-circle"></i></span>
                    <span class="txt-link">Create</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="register">
        <div class="container">
            <div class="title">Update a Product</div>
            <div>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>


                @endif
            </div>
            <form method="post" action="{{route('product.update', ['product' => $product])}}">
                @csrf
                @method('put')
                <div class="product-info">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" placeholher="Product name" name="name" value="{{$product->name}}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="textarea"  placeholher="Description" name="description" value="{{$product->description}}" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Price</span>
                        <input  type="text"  placeholher="0, 00" name="price" value="{{$product->price}}" required>
                    </div>
                </div>
                <div class="disp-details">
                <input type="radio" name="disp" value="{{$product->disp}}" id="dot-1" >
                <input type="radio" name="disp" value="{{$product->disp}}"id="dot-2">
                    <span class="disp-title">Disponible to sale</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender" name="y" value="{{$product->disp}}">Yes</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender" name="n" value="{{$product->disp}}">No</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Update">
                </div>
            </form>
        </div>
    </div>
    
    @vite('resources/js/app.js')
</body>
</html>
