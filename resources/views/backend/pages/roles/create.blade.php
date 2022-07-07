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
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Permissions</label>


                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                {{-- <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"> --}}
                                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                                @php  $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                    @php  $i++; @endphp
                                @endforeach


                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- sales report area end -->

</div>
<script src="text/javascript">
    $("#checkPermissionAll").click(function(){
        if($(this).is(':checked')){
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        }else{
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+'input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
    }
</script>
@endsection

