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
              @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
              @endif
      </div>
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
@endsection
