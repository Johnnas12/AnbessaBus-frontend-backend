@extends('Admin.layouts.index')
@section('main-content')
<div class="container">
    <h1>Blogs</h1>

    @forelse ($blog as $blogs )
    <div class="blog-card">
        <img src="{{asset('images/' . $blogs->profile)}}" alt="Blog Post Image">
        <div class="card-body">
            <h5 class="card-title">{{$blogs->title}}</h5>
            <p class="card-text">{{$blogs->description}}</p>
            <div class="btn-group">
                <a href="{{ route('editblog', ['id' => $blogs->id]) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('deleteBlog', ['id' => $blogs->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty

    <div class="text-center">
        <h1>No Blog posted Yest</h1>
    </div>
        
    @endforelse



    <!-- Add more blog posts here -->

</div>


@endsection