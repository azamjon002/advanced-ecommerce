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
        <form class="mt-5" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Product Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Product Title">
            </div>
            <div class="form-group mb-3">
                <label for="description">Product Description</label>
                <textarea cols="30" rows="10" id="description" name="description" class="form-control" placeholder="Product Description"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantity">
            </div>
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" placeholder="Price">
            </div>
            <div class="form-group mb-3">
                <label for="discount_price">Dicount Price</label>
                <input type="number" id="discount_price" name="discount_price" class="form-control" placeholder="Price">
            </div>
            <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <div>
                    <input type="file" id="image" name="image">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
