<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @vite('resources/css/app.css')
    @vite('resources/css/list.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="menu-lateral">
        <div class="btn-expandir">
            <i class="bi bi-list" id="btn-exp"></i>
        </div>

        <ul>
            <li class="item-menu ativo">
                <a href="{{url('/')}}">
                    <span class="icon"><i class="bi bi-table"></i></span>
                    <span class="txt-link">Products</span>
                </a>
            </li>            
            <li class="item-menu">
                <a href="{{url('/create')}}">
                    <span class="icon"><i class="bi bi-plus-circle"></i></span>
                    <span class="txt-link">Create</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="list">
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
           <div class="table">
            <div class="table_header">
                <p>All Products</p>
                <div>
                    <button class="add_new"><a href="{{url('/create')}}">Add New</a></button>
                </div>
            </div>
            <div class="table_section">
                <table>
                    <thead>
                    <tr>
                        <td>IdProduct</td>
                        <td>Name</td>
                        <td>Value</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>        
                    </thead>
                   @foreach($products as $product)
                   <tr>
                       <td>{{$product->id}}</td>
                       <td>{{$product->name}}</td>
                       <td>R$ {{$product->price}}</td>
                       <td><a href="{{route('product.edit', ['product'=> $product])}}"><i class="bi bi-pencil"></i></a></td>
                       <td>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product->id]) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>      
                   @endforeach
                </table>
            </div>
            <!--
            <div class="pagination">
                <div><i class="fa-solid fa-angles-left"></i></div>
                <div><i class="fa-solid fa-chevron-left"></i></div>
                <div>1</div>
                <div>2</div>
                <div><i class="fa-solid fa-chevron-right"></i></div>
                <div><i class="fa-solid fa-angles-right"></i></div>
            </div>
           </div>-->
    </div>

    @vite('resources/js/app.js')
</body>
</html>
