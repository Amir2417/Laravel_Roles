@extends("backend.layouts.master")
@section('title')
Product
@endsection
@section("admin_content")
<div class="row mx-5 my-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Product List</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Product Name</th>
                            <th>Size</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->size }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success d-none">Save Data Successfully...</div>
                <h4 class="header-title">Add Product</h4>
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="">Category Select <span class="text-danger">*</span></label>
                        <div class="controls">
                            <select name="category_id" class="form-control" required>
                                <option value="" selected="" disabled="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input name="product_name" type="text" class="form-control"  placeholder="Enter Product Name">

                    </div>
                    <div class="form-group">
                        <label for="name">Size</label>
                        <input name="size" type="text" class="form-control"  placeholder="Enter Product Size">

                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input name="price" type="text" class="form-control"  placeholder="Enter Product Price">

                    </div>
                    <div class="form-group">
                        <label for="name">Photo</label>
                        <input name="photo" type="file" class="form-control">

                    </div>

                    <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
