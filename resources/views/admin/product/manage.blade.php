@extends('admin.master')

@section('title')
    Product Manage Page
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">All Course Information</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Product Title</th>
                            <th>Category</th>
                            <th>brand Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($products as  $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td><img src="{{asset($product->image)}}" alt="" style="height: 100px;width: 100px;"></td>
                                <td>
                                    <a href="{{route('update.product',['id' => $product->id])}}" class="btn btn-success">Edit</a>
                                  <a href="{{route('delete.product',['id' => $product->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this')">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection




