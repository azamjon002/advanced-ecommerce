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
                          <form class="mt-5" action="{{route('category.store')}}" method="POST">
                              @csrf
                              <div class="form-group">
                                  <label for="category">Category Name</label>
                                  <input type="text" id="category" name="category_name" class="form-control" placeholder="Category Name">
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                          </form>
                  </div>
              </div>
          </div>
      </div>
@endsection
