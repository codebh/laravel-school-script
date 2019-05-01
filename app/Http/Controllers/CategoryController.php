<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Category;


class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public  function  viewCategory(){


        $cates = Category::all();
        return view('admin.category')->with('cates',$cates);
    }



    public  function addCategory(Request $request){
        $this->validate($request,[
            'name'=>' required'

        ]);

        $categories = new Category();
        $categories->ca_name = $request->input('name');
        $categories->save();
        return redirect()->route('admin.category');
    }

    public  function deleteCategory($id){
       $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('admin.category')->with('del','delete ok');
    }



}
