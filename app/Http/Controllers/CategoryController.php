<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view ('admin.category.category-add');
    }

    public function savecategoryinfo(Request $request){
     $categories= new Category();
      $categories->category_name  = $request->category_name;
      $categories->category_description  = $request->category_description;
      $categories->publication_status  = $request->publication_status;
      $categories->save();

      return  redirect('/category/add')->with('message','category add successfully');

    }

    public function managecategoryinfo(){
        $categories=Category::all();
        return view('admin.category.manage',['categories'=>$categories]);
    }

    public function unpublishedcategoryinfo($id){
       $category= Category::find($id);
       $category->publication_status=0;
       $category->save();
       return redirect('/category/manage')->with('message', 'category info unpublished successfully');

    }

    public function publishedcategoryinfo($id){
        $category= Category::find($id);
        $category->publication_status=1;
        $category->save();
        return redirect('/category/manage')->with('message', 'category info published successfully');
 
     }
     public function editcategoryinfo($id){
        $category= Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);

     }
     public function updatecategoryinfo( Request $request){
         $category = Category::find($request->category_id);
         $category->category_name  = $request->category_name;
         $category->category_description  = $request->category_description;
         $category->publication_status  = $request->publication_status;
         $category->save();
         return redirect('/category/manage')->with('message', 'category update successfully');

     }

     public function deletecategoryinfo($id){
        $category= Category::find($id);
        $category->delete();
        return redirect('/category/manage')->with('message', 'category info delete successfully');

     }

}
