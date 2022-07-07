<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   public function index()
   {
    $roles = Role::all();
    return view('backend.pages.roles.index',compact('roles'));
   }
   public function create()
   {
    $permissions = Permission::all();
    $permission_groups = User::getpermissionGroups();

    return view('backend.pages.roles.create',compact('permissions','permission_groups'));
   }
   public function store(Request $request)
   {
    $role = Role::create(['name' => $request->name]);
    $permissions = $request->input('permissions');

    if (!empty($permissions)) {
        $role->syncPermissions($permissions);
    }
    return back();

   }
   public function page(){
    return view('backend.category.index');
}
}
