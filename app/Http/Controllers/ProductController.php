<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use DB;

class ProductController extends Controller
{
    public function index(){
        $categories=Category::where('publication_status', 1)->get();
        $brands=Brand::where('publication_status', 1)->get();
        
        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands,
        ]);
    }

    protected function validateproductinfo($request){
        $this->validate($request,[
            'category_id'=>'required',
             'brand_id'=>'required',
            'product_name'=>'required',
            'product_price'=>'required',
            'product_quantity'=>'required',
            'short_description'=>'required',
            'product_image'=>'required',
            'publication_status'=>'required',

        ]); 
    }
  
    protected function productuploadimage($request){
        $productimage=$request->file('product_image');
        $filename= $productimage->getClientOriginalExtension();
        $imagename=$request->product_name.'.'.$filename;
        $directory='product-images/';
        // $productimage->move($directory,$imagename);
        $imageurl=$directory.$imagename;
        Image::make($productimage)->save($imageurl);
        return $imageurl;
    
    }

    protected function saveproductbasicinfo($request, $imageurl){
        $products=new Product();
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->short_description = $request->short_description;
        $products->long_description = $request->long_description;
        $products->product_image = $imageurl;
        $products->publication_status = $request->publication_status;
        $products->save();
    }
    

    public function saveproductinfo(Request $request){
     $this->validateproductinfo($request);
     $imageurl=$this->productuploadimage($request);
     $this->saveproductbasicinfo($request,$imageurl);

     return redirect('product/manage')->with('message', 'product save successfully');

    }

    public function mangeproductinfo(){
       $products=DB::table('products')
                ->join('categories','products.category_id','=','categories.id')
                ->join('brands','products.brand_id','=','brands.id')
                ->select('products.*','categories.category_name','brands.brand_name')
                ->get();
       return view('admin.product.manage-product',['products'=>$products]);
    }

    public function productunpublishedinfo($id){
        $product=Product::find($id);
        $product->publication_status=0;
        $product->save();
        return redirect('product/manage')->with('message', 'product unpubulished successfully');

    }

    public function productpublishedinfo($id){
        $product=Product::find($id);
        $product->publication_status=1;
        $product->save();
        return redirect('product/manage')->with('message', 'product pubulished successfully');

    }

    public function editproductinfo($id){

        $product=Product::find($id);
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        return view('admin.product.edit-product',[
            'product'=>$product,
            'categories'=>$categories,
            'brands'=>$brands
            ]);

    }


    public function productbasicupdateinfo($products,$request,$imageurl=null){
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_price = $request->product_price;
        $products->product_quantity = $request->product_quantity;
        $products->short_description = $request->short_description;
        if($imageurl){
            $products->product_image = $imageurl;
        }
        $products->long_description = $request->long_description;
        $products->publication_status = $request->publication_status;
        $products->save();
    }

    public function updateproductinfo(Request $request){

        $productimage=$request->file('product_image');
        $products=Product::find($request->product_id);
    
        if($productimage){
            unlink($products->product_image);
    
            $imageurl=$this->productuploadimage($request);
           $this->productbasicupdateinfo($products,$request,$imageurl);
            
        }else{
    
            $this->productbasicupdateinfo($products,$request);
        }
        return redirect('/product/manage')->with('message', 'product update successfully');

    }

}
