<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }

    public function savebrandinfo(Request $request){
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:2',
            'brand_description'=>'required',
            'publication_status'=>'required'
        ]);
        $brands=new Brand();
      $brands->brand_name =  $request->brand_name;
      $brands->brand_description =  $request->brand_description;
      $brands->publication_status =  $request->publication_status;
      $brands->save();
      return redirect('/brand/add')->with('message','brand add successfully');
    }

    public function managebrand(){
        $brands=Brand::all();
        return view('admin.brand.manage-brand',['brands'=>$brands]);
    }

    public function unpublishedbrandinfo($id){
       $brand= Brand::find($id);
       $brand->publication_status=0;
       $brand->save();
       return redirect('/brand/manage')->with('message','brand unpublished successfully');

    }

    public function publishedbrandinfo($id){
        $brand= Brand::find($id);
        $brand->publication_status=1;
        $brand->save();
        return redirect('/brand/manage')->with('message','brand published successfully');
 
     }
     public function editbrandinfo($id){
        $brand= Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
     }

     public function updatebrandinfo(Request $request){
        $brand= Brand::find($request->brand_id);
        $brand->brand_name =  $request->brand_name;
        $brand->brand_description =  $request->brand_description;
        $brand->publication_status =  $request->publication_status;
        $brand->save();
        return redirect('/brand/manage')->with('message','brand update successfully');
     }
     public function deletebrandinfo($id){
        $brand= Brand::find($id);
        $brand->delete();
        return redirect('/brand/manage')->with('message','brand delete successfully');
     }

}