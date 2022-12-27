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
                        <h4 class="card-title float-left">All Category</h4>
                        <a href="{{route('category.create')}}" class="btn btn-outline-primary float-right">Add New Category</a>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> Id</th>
                                    <th> Category Name </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="float-left mr-2 badge badge-outline-success">Edit</a>
                                            <form action="{{route('category.destroy',$category->id)}}" onsubmit="return confirm('Are You Sure ?');" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class=" badge badge-outline-danger" >Delete</button>
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


