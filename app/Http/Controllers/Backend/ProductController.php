<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   public function create(){
    $categories = Category::latest()->get();
    $products = Product::latest()->get();
    return view('backend.pages.products.create',compact('categories','products'));
   }
   public function store(Request $request){
    $rules = array(
        'category_id' => 'required|',

        'product_name' => 'required',
        'size' => 'required',
        'price' => 'required',

        'photo'=> 'mimes:jpg,png,jpeg,gif,bmp|nullable'
    );

    $error = Validator::make($request->all(), $rules);

    if($error->fails())
    {


        return redirect()->back();
    }
    $data = new Product();
    $input = $request->all();
    if ($file = $request->file('photo'))
     {

        $image_gen = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300,300)->save('images/products/'.$image_gen);
        $name = 'images/products/'.$image_gen;
        $input['photo'] = $name;
    }
    $data->fill($input)->save();
    return redirect()->back();
   }
}
