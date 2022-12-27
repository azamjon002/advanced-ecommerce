@extends('admin.master')
@section('content')
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <h4 class="card-title float-left">All Product</h4>
                        <a href="{{route('product.create')}}" class="btn btn-outline-primary float-right">Add New Product</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Title </th>
                                    <th> Image </th>
                                    <th> Price  </th>
                                    <th> Quantity  </th>
                                    <th> Category  </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($products as $key=>$product)
                                    @php
                                        $category = \App\Models\Category::where('id', $product->category_id)->get()
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>
                                            <img src="{{$product->getFirstMediaUrl()}}" alt="rasm">
                                        </td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$category[0]->category_name}}</td>
                                        <td>
                                            <a href="{{route('product.edit',$product->id)}}" class="float-left mr-2 badge badge-outline-success">Edit</a>
                                            <a href="{{route('product.show',$product->id)}}" class="float-left mr-2 badge badge-outline-primary">Show</a>
                                            <form action="{{route('product.destroy',$product->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" badge badge-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


