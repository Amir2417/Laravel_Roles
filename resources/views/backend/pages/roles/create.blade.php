@extends("backend.layouts.master")
@section('title')
Role List
@endsection
@section("admin_content")

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('roles') }}">Role</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ asset('backend/assets/images/author/avatar.png') }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Amir Sohel <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Message</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->
<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Role</h4>
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name"  aria-describedby="name" placeholder="Enter a role name">

                            </div>
                            <div class="form-group">
                                <label for="">Permission</label>
                                @foreach ($permissions as $permission )
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-check-input" id="exampleCheck{{ $permission->id }}">
                                        <label class="form-check-label" for="exampleCheck{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach

                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- sales report area end -->

</div>
@endsection
