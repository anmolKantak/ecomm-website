<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Auth;
use Session;
use App\Models\Category;
use App\Product;
use Cart;

class ProductsController extends Controller
{
    public function addProduct(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Under category is missing!');
            }
            $product = new Product;
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            if(!empty($data['description'])){
                $product->description = $data['description'];
            }else{
                $product->description = ' ';
            }
            $product->price = $data['price'];
            if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;

                    $product->image = $filename;

                }
            }
            $product->save();
            return redirect('/pages/pages/view_products')->with('flash_message_success','Product added successfully!');
        }

        $categories = Category::where(['parent_id' =>0])->get();
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach($categories as $cat){
            $categories_dropdown .= "<option value=' ". $cat->id . " ' > ". $cat->category_name ." </option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value= ' ". $sub_cat->id ." '>&nbsp;--&nbsp;".$sub_cat->category_name ."</option>";
            }
        }


        return view('pages/pages/products.add_products')->with(compact('categories_dropdown'));
    }
    public function addtocart(Request $request){

        return view('products.cart');
    }

    public function checkout(){
        return view('products.checkout');
    }
}
