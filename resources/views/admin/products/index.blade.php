@extends('layouts.admin')

@section('content')

<div class="card-header">
    <a href="{{ route('dashboard')}}">Admin
    </a>
    /
    <span>
        <a href="{{ route('products.index')}}">Product
        </a>
    </span>
</div>
<div class="card">
    <div class="card-header">
        <h3>Product List
            <a href="{{ route('products.create')}}" class="btn btn-primary float-right">
                Create
            </a>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Tag</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            @foreach($product->tags as $tag)
                            <span class="badge badge-primary"> {{ $tag->name  }}</span>
                            @endforeach
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            @if(count($product->gallery) > 0)
                            <a href="{{ $product->getMedia('gallery')->first()->getUrl() }}" target="_blank">
                                <img src="{{ $product->getMedia('gallery')->first()->getUrl() }}" width="45px" height="45px" alt="">
                            </a>
                            @else
                            <span class="badge badge-warning">no image</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form onclick="return confirm('Are you sure ? ')" action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<!-- </div> -->

@endsection
