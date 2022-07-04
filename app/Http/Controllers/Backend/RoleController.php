<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
   public function index()
   {
    $roles = Role::all();
    return view('backend.pages.roles.index',compact('roles'));
   }
}
