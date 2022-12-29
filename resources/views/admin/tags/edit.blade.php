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
        <h3>Edit Tag List
            <a href="{{ route('tags.index')}}" class="btn btn-primary float-right">
                Go Back
            </a>
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('tags.update', $tag->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<br>
@endsection
