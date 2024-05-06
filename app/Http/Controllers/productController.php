<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\color;
use App\Models\gallaryimage;
use App\Models\productmodel;
use App\Models\size;
use App\Models\subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class productController extends Controller
{
    //
    public function productlist()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $products = productmodel::orderby('id', 'desc')->with('category', 'subcategory')->get();
                return view('backend.admin.products.list', compact('products'));
            }
        }
    }
    public function productAddNew()
    {
        $products = Category::get();
        $subproducts = subcategory::get();

        return view('backend.admin.products.add', compact('products', 'subproducts'));
    }
    public function productStore(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $product = new productmodel();
                $product->name = $request->name;
                $product->slug = Str::slug($request->name);
                $product->cat_id = $request->cat_id;
                $product->subcat_id = $request->subcat_id;
                $product->quantity = $request->quantity;
                $product->buy_price = $request->buy_price;
                $product->discount_price = $request->discount_price;
                $product->regular_price = $request->regular_price;
                $product->sqy_code = $request->sqy_code;
                $product->short_desc = $request->short_desc;
                $product->long_desc = $request->long_desc;
                $product->product_policy = $request->product_policy;
                $product->product_type = $request->product_type;
                if (isset($request->image)) {
                    $imageName = rand() . 'product' . '.' . $request->image->extension();
                    $request->image->move('backend/image/product', $imageName);
                    $product->image =  $imageName;
                }
                $product->save();
                if (isset($request->color)) {
                    foreach ($request->color as $color) {
                        $colors = new color();
                        $colors->product_id = $product->id;
                        $colors->color = $color;
                        $colors->save();
                    }
                }
                if (isset($request->size)) {
                    foreach ($request->size as $size) {
                        $sizes = new size();
                        $sizes->product_id = $product->id;
                        $sizes->name = $size;
                        $sizes->save();
                    }
                }
                if (isset($request->GallaryImage)) {

                    foreach ($request->GallaryImage as $image) {
                        $gallaryImage = new gallaryimage();
                        $gallaryImage->peoduct_id = $product->id;
                        $imageName = rand() . 'gallaryImage' . '.' . $image->extension();
                        $image->move('backend/image/gallaryimage', $imageName);
                        $gallaryImage->gallary_image = $imageName;
                        $gallaryImage->save();
                    }
                }
                toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                return redirect()->back();
            }
        }
    }
    public function productedit($id)
    {

        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $product = productmodel::where('id', $id)->with('color', 'size', 'gallaryimage')->first();
                $products = Category::orderby('name', 'asc')->get();
                $subproducts = subcategory::orderby('name', 'asc')->get();
                return view('backend.admin.products.edit', compact("product", "products", "subproducts"));
            }
        }
    }
    public function productupdate(Request $request, $id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $productedit = productmodel::find($id);
                $productedit->name = $request->name;
                $productedit->slug = Str::slug($request->name);
                $productedit->cat_id = $request->cat_id;
                $productedit->subcat_id = $request->subcat_id;
                $productedit->quantity = $request->quantity;
                $productedit->buy_price = $request->buy_price;
                $productedit->discount_price = $request->discount_price;
                $productedit->regular_price = $request->regular_price;
                $productedit->short_desc = $request->short_desc;
                $productedit->long_desc = $request->long_desc;
                $productedit->product_policy = $request->product_policy;
                $productedit->product_type = $request->product_type;
                if ($request->image) {
                    if (isset($productedit->image) && file_exists('backend/image/product/' . $productedit->image)) {
                        unlink('backend/image/product/' . $productedit->image);
                    }
                    $imagename = rand() . 'productimage' . '.' . $request->image->extension();
                    $request->image->move('backend/image/product', $imagename);
                    $productedit->image = $imagename;
                }
                if ($request->color) {
                    $colors = color::where('product_id', $productedit->id)->get();
                    foreach ($colors as $color) {
                        $color->delete();
                    }

                    foreach ($request->color as $name) {
                        $colors = new color();
                        $colors->product_id = $productedit->id;
                        $colors->color = $name;
                        $colors->save();
                    }
                }
                if ($request->size) {
                    $sizes = size::where('product_id', $productedit->id)->get();
                    foreach ($sizes as $size) {
                        $size->delete();
                    }
                    foreach ($request->size as $size) {
                        $sizes =  new size();
                        $sizes->product_id = $productedit->id;
                        $sizes->name = $size;
                        $sizes->save();
                    }
                }
                if (isset($request->GallaryImage)) {
                    $Image = gallaryimage::where('peoduct_id', $productedit->id)->get();
                    foreach ($Image as $images) {
                        if ($images->gallary_image && file_exists('backend/image/gallaryimage/' . $images->gallary_image)) {
                            unlink('backend/image/gallaryimage/' . $images->gallary_image);
                        }
                        $images->delete();
                    }
                    foreach ($request->GallaryImage as $image) {
                        $images = new gallaryimage();
                        $images->peoduct_id = $productedit->id;
                        $imagename = rand() . 'gallaryimage' . '.' . $image->extension();
                        $image->move('backend/image/gallaryimage', $imagename);
                        $images->gallary_image = $imagename;
                        $images->save();
                    }
                }
            }


            $productedit->save();
            return redirect()->back();
        }
    }
    public function productDelete($id)
    {
        $product = productmodel::find($id);
        if (isset($product->image) && file_exists('backend/image/product/' . $product->image)) {
            unlink('backend/image/product/' . $product->image);
        }
        $colors = color::where('product_id', $product->id)->get();
        foreach ($colors as $color) {
            $color->delete();
        }
        $sizes = size::where('product_id', $product->id)->get();
        foreach ($sizes as $size) {
            $size->delete();
        }

        $Image = gallaryimage::where('peoduct_id', $product->id)->get();
        foreach ($Image as $images) {
            if ($images->gallary_image && file_exists('backend/image/gallaryimage/' . $images->gallary_image)) {
                unlink('backend/image/gallaryimage/' . $images->gallary_image);
            }
            $images->delete();
        }
        $product->delete();
        return redirect()->back();
    }
}
