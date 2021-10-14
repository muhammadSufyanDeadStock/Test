@extends('home')
@section('content')
<div class="container-fluid">
    <div class="jumbotron">
        <h1 class="text-center">Edit Product</h1>
    </div>
    <a href="{{route('products')}}" class="h5 mb-4 text-primary nav-link">Home</a>

    <form class="form m-auto" action="{{route('products.update')}}" method="POST">
        @csrf
        <div class="form-group row col-4">
            <label for="" class="col-4">Title</label>
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="text" class="form-control col-8" value="{{$product->title}}" name="title" required >

            @error('title')
                <span class="ml-3"><strong class="text-danger">{{$message}}</strong></span>
            @enderror
        </div>
        <div class="form-group row col-4">
            <label for="" class="col-4">Description</label>
            <input type="text" class="form-control col-8" value="{{$product->description}}" name="description" required >
            @error('description')
                <span class="ml-3"><strong class="text-danger">{{$message}}</strong></span>
            @enderror
        </div>
        <div class="form-group row col-4">
            <label for="" class="col-4">Price</label>
            <input type="number" class="form-control col-8" value="{{$product->price}}" name="price" required >
            @error('price')
            <span class="ml-3"><strong class="text-danger">{{$message}}</strong></span>
            @enderror
        </div>
       <center>
           <button class="btn btn-primary">Save</button>
       </center>
    </form>
</div>


@endsection
