<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view("admin.categories.index",
            ["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "categoryName"=>"required|unique:categories|max:255|min:3",
            "categoryDescription" =>"required|max:255|min:3"
        ]);
        $categories = new Category();
        $categories->categoryName =$request->input("categoryName");
        $categories->categoryDescription =$request->input("categoryDescription");
        $categories->categorySlugName = $categories->slugNameGenerate($request->input("categoryName"));
        $categories->save();

        if(!$categories){
            return redirect()->back()->withErrors("Could not add the product Category");
        }
        return redirect()->route("categories.index")->with("success","Successful added ".
            $categories->$categories." Product Category ");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $this->validate($request,[
            "categoryName"=>"required|max:255|min:3",
            "categoryDescription" =>"required|max:255|min:3"
        ]);
        $category =Category::find($category);
        $category->categoryName =$request->input("categoryName");
        $category->categoryDescription =$request->input("categoryDescription");
        $category->categorySlugName = $category->slugNameGenerate($request->input("categoryName"));
        $category->save();
        if(!$category){
            return redirect()->back()->withErrors("Could not update the product category");
        }
        return redirect()->route("categories.index")->with("success","Successful edited product category");
        // return $request;//->input("categoryName");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::find($category);
        //$product = Product::find();
        $category->products()->detach();
        $category->delete();
        if(!$category){
            return redirect()->back()->withErrors("Could not delete the product type");
        }
        return redirect()->route("categories.index")->with("success","Successful Deleted ");
    }
}
