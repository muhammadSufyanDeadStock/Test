@extends('home')
@section('content')
<div class="row">
    <div class="col-md-12 bg-light text-right">
        <a class="btn btn-primary text-right" href="{{route('products.add')}}">Add Product</a>
        <a class="btn btn-success text-right" href="{{route('products.export')}}">Export CSV Queue</a>
        <a class="btn btn-success text-right" href="{{route('products.export.direct')}}">Export CSV Direct</a>
    </div>
    @if (isset($message))
        <div class="alert alert-success" role="alert">
       {{$message}}
      </div>
    @endif

    <div class="col-md-12">
        <table class="table table-stripped">
            <thead>
                <th>Sr.#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->price}}</td>
                        <td><a href="{{route('products.edit',$item->id)}}" class="btn btn-sm btn-primary">Edit</a><a href="{{route('products.delete',$item->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
