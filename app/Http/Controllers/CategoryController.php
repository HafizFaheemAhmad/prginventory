<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::get();
        $products = Product::get();

        return view('categories', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
        ]);
        Category::create($request->all());
        $notification = array(
            'message' => "Category has been added",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Edit Category";
        $categories = Category::find($id);

        return view('categories',compact(
            'categories'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:100']);
        $category = Category::find($request->id);
        $category->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => "Category has been updated",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();
        $notification = array(
            'message' => "Category has been deleted",
            'alert-type' => 'success',
        );
        return back()->with($notification);
    }

    public function shows(Category $category)
    {
        return view('categories-show', [
            'category' => $category,
            'products' => Product::where('category_id', $category->id)->paginate(25)
        ]);
    }
}
