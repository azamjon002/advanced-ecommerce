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
                            @endif
                        <a href="{{route('product.index')}}" class="btn btn-warning float-right">Back</a>
                        <form class="forms-sample mt-3" action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control bg-black focus:bg-black text-white placeholder:text-white" name="title" id="exampleInputName1" value="{{$product->title}}" placeholder="{{$product->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Price</label>
                                <input type="number" class="form-control bg-black focus:bg-black text-white placeholder:text-white" id="exampleInputEmail3" name="price" value="{{$product->price}}" placeholder="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Discount Price</label>
                                <input type="number" class="form-control bg-black focus:bg-black text-white placeholder:text-white" id="exampleInputPassword4" name="discount_price" value="{{$product->discount_price}}" placeholder="{{$product->discount_price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword5">Quantity</label>
                                <input type="number" class="form-control bg-black focus:bg-black text-white placeholder:text-white" id="exampleInputPassword5" name="quantity" value="{{$product->quantity}}" placeholder="{{$product->quantity}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Category</label>
                                <select class="form-control bg-black focus:bg-black text-white placeholder:text-white" name="category_id"  id="exampleSelectGender">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->id? 'selected' : ''}}>{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control bg-black focus:bg-black text-white placeholder:text-white">
                                <div>
                                    <img src="{{$product->getFirstMediaurl()}}" width="150">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea name="description" class="form-control bg-black focus:bg-black text-white placeholder:text-white" id="exampleTextarea1" rows="4">
                                {{$product->description}}
                            </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
