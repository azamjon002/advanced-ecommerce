@extends('admin.master')
@section('content')

      <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          <a href="{{route('category.index')}}" class="btn btn-warning float-right">Back</a>
                      @endif
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
              </div>
          </div>
      </div>
@endsection
