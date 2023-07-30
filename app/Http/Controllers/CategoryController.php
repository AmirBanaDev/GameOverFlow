<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('posts.category',[
            'categories'=>Category::all()
        ]);
    }
    public function store(Request $request)
    {
        Category::query()->create([
            'game'=>$request->get('category_name'),
            'image'=>$request->file('category_image')->storeAs('/public/image',$request->file('category_image')->getClientOriginalName())
        ]);
        return back();
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
    public function edit(Category $category)
    {
        return view('admin.edit_category',[
            'category'=>$category
        ]);
    }
    public function update(Request $request,Category $category)
    {
        if(Category::query()->where('game',$request->get('category_name'))->where('id','!=',$category->id)->exists())
        {
            return back()->withErrors(['game'=>'این دسته وجود دارد']);
        }
        $imagePath=$request->file('category_image');
        if($imagePath==null)
        {
            $imagePath = $category->image;
        }
        else
        {
            $imagePath=$request->file('category_image')->storeAs('/public/image'.$request->file('category_image')->getClientOriginalName());
        }
        $category->update([
            'game'=>$request->get('category_name'),
            'image'=>$imagePath
        ]);
        return redirect('/admin/category');
    }
}
