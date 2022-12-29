@extends('layouts.admin')

@section('content')

<div class="card-header">
    <a href="{{ route('dashboard')}}">Admin
    </a>
    /
    <span>
        <a href="{{ route('tags.index')}}">Tag
        </a>
    </span>
</div>
<div class="card">
    <div class="card-header">
        <h3>Tag List
            <a href="{{ route('tags.create')}}" class="btn btn-primary float-right">
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
                        <th>Slug</th>
                        <th>Product Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->slug}}</td>
                        <td>{{$tag->products_count}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form onclick="return confirm('Are you sure ? ')" action="{{ route('tags.destroy', $tag->id) }}" method="post">
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
