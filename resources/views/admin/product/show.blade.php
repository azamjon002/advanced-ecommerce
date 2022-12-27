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
                        <form class="forms-sample mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input readonly type="text" class="form-control focus:bg-white text-white placeholder:text-black hover:text-white" name="title" id="exampleInputName1" placeholder="{{$product->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Price</label>
                                <input readonly type="number" class="form-control focus:bg-white text-white placeholder:text-black hover:text-white" id="exampleInputEmail3" name="price" placeholder="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Discount Price</label>
                                <input readonly type="number" class="form-control focus:bg-white text-white placeholder:text-black hover:text-white" id="exampleInputPassword4" name="discount_price"  placeholder="{{$product->discount_price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword5">Quantity</label>
                                <input readonly type="number" class="form-control focus:bg-white text-white placeholder:text-black hover:text-white" id="exampleInputPassword5" name="quantity"  placeholder="{{$product->quantity}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Category</label>
                                <input readonly type="number" class="form-control focus:bg-white text-white placeholder:text-black hover:text-white " placeholder="{{ $category = \App\Models\Category::where('id', $product->category_id)->get()[0]->category_name}}">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <div>
                                    <img src="{{$product->getFirstMediaurl()}}" width="150">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea readonly name="description" class="form-control text-black focus:bg-black hover:text-white" id="exampleTextarea1" rows="4">
                                {{$product->description}}
                            </textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
