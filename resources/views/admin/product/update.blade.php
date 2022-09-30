@extends('admin.master')

@section('title')
    Product
@endsection

@section('body')
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Update Product Form</h4>

                        <form method="POST" action="{{route('edit.product',['id'=>$products->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" value="{{$products->title}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="category" value="{{$products->category}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-password-input" class="col-sm-3 col-form-label">brand name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="brand" value="{{$products->brand}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price" value="{{$products->price}}">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="summernote form-control" name="description">{{$products->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control-file" name="image">
                                    <img src="{{asset($products->image)}}" height="200" width="200">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">


                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Update Product</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

