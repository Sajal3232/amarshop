<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class amarshopController extends Controller
{
    public function index(){
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        $products=Product::where('publication_status',1)
                    ->orderby('id','DESC')
                    ->take(6)
                    ->get();
        return view ('front-end.home.home',[
            'categories'=>$categories,
            'brands'=>$brands,
            'products'=>$products
            ]);
    }

    public function categoryproductsinfo($id){
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        $categoriesproducts=Product::where('category_id',$id)
                            ->where('publication_status',1)
                            ->get();
         return view('front-end.category.category-content',[
             'categoriesproducts'=>$categoriesproducts,
             'categories'=>$categories,
             'brands'=>$brands
             ]);
    }

    public function brandproductsinfo($id){
        $brands=Brand::where('publication_status',1)->get();
        $categories=Category::where('publication_status',1)->get();
        $brandsproducts=Product::where('brand_id',$id)
                            ->where('publication_status',1)
                            ->get();
         return view('front-end.brand.brand-content',[
             'brandsproducts'=>$brandsproducts,
             'brands'=>$brands,
             'categories'=>$categories

             ]);
    }

    ///show of brands
     
}
