<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class categoryController extends Controller
{
    public function CategoryAddNew()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                return view('backend.admin.category.categoryAdd');
            }
        } else {
            return redirect()->back();
        }
    }

    public function CategoryStore(Request $store)
    {
        if (Auth::user())
         {
            if (Auth::user()->role == 1)
             {
                $CategoryStore = new Category();
                $CategoryStore->name = $store->name;
                $CategoryStore->slug = Str::slug($store->name);
                if (isset($store->image)) {
                    $imageName = rand() . 'category' . '.' . $store->image->extension();
                    $store->image->move('backend/image/category', $imageName);
                    $CategoryStore->image = $imageName;
                }
                $CategoryStore->save();
                toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
                return redirect('/admin/category/list');
            }
        }
    }
    public function Categorylist()
    {
        if (Auth::user()) 
        {
            if (Auth::user()->role == 1)
             {
                $categorylist =  Category::get();
                return view('backend.admin.category.list', compact('categorylist'));
            }
        }
    }
    public function categoryDelete($id)
    {

        $categoryDelete = Category::find($id);
        if ($categoryDelete->image && file_exists('backend/image/category/' . $categoryDelete->image)) {
            $categoryDelete->delete();
            toastr()->success('Data has been Delete successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect()->back();
        }
    }
    public function categoryedit($id)
    {
        if (Auth::user()) 
        {
            if (Auth::user()->role == 1)
             {
                $categoryedit = Category::find($id);
                return view('backend.admin.category.edit', compact('categoryedit'));
            }
        }
    }
    public function categoryupdate(Request $reqest,$id)
    {
        if(Auth::user())
        {
            if(Auth::user() ->role == 1)
            {
                $categoryupdate= Category::find($id);
                $categoryupdate->name= $reqest->name;
                if(isset($reqest->image)){
                    if(isset( $categoryupdate->image) && file_exists('backend/image/category/'.$categoryupdate->image)){
                        unlink('backend/image/category/'.$categoryupdate->image);
                    }
                    $categoryupdateimage= rand(). 'categoryupdate' . '.' .$reqest->image->extension();
                    $reqest->image->move('backend/image/category', $categoryupdateimage);
                    // $store->image->move('backend/image/category', $imageName);
                    $categoryupdate->image=$categoryupdateimage;

                }

            }
            $categoryupdate->save();
            toastr()->success('Data has been update successfully!', 'Congrats', ['timeOut' => 5000]);
            return redirect('/admin/category/list');


        }


    }
    public function subCategoryAddNew(){
        if(Auth::user()){
            if(Auth::user()->role==1){
                $subcat = Category::get();
                return view ('backend/admin/category/subCategoryAdd',compact('subcat'));

            }
        }
        else{
            return redirect()->back();
        }
       

    }

};
