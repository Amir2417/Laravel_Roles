@extends("backend.layouts.master")
@section('title')
Category
@endsection
@section("admin_content")
<div class="row mx-5 my-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Category List</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="" class="btn btn-success">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success d-none">Save Data Successfully...</div>
                <h4 class="header-title">Add Category</h4>
                <form action="javascript:void(0)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control"  placeholder="Enter Category Name">

                    </div>

                    <button type="submit" id="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $('body').on('click','#submit',function(){
        var name = $('#name').val();

        $.ajax({
            url : 'store/'+name,
            method:'get',
            success: function(result){
                $('.alert-success').removeClass('d-none');
            }
        })
    })
</script>

@endsection
