@extends('admin.master')
@section('content')
    <div class="container m-5">
      <div class="mt-5">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      </div>
        <form class="mt-5" action="{{route('category.update', $category->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category">Category Name</label>
                <input type="text" id="category" name="category_name" class="form-control text-danger" value="{{$category->category_name}}" placeholder="{{$category->category_name}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
